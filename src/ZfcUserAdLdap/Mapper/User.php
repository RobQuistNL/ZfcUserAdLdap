<?php
/**
 * This file is part of the ZfcUserAdLdap Module (https://github.com/RobQuistNL/ZfcUserAdLdap)
 *
 * Copyright (c) 2013 Rob Quist (https://github.com/RobQuistNL)
 *
 * For the full copyright and license information, please view
 * the file LICENSE.txt that was distributed with this source code.
 */
namespace ZfcUserAdLdap\Mapper;


use ZfcUser\Mapper\User as ZfcUserMapper;
use ZfcUserAdLdap\Options\ModuleOptions;
use ZfcUserAdLdap\Service\LdapInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;

class User extends ZfcUserMapper
{
    /** @var \ZfcUserAdLdap\Service\LdapInterface */
    protected $ldap;
    /**
     * @var \ZfcUserAdLdap\Options\ModuleOptions
     */
    protected $options;

    /**
     * Constructor
     * @param LdapInterface $ldap
     * @param ModuleOptions $options
     */
    public function __construct(LdapInterface $ldap, ModuleOptions $options)
    {
        $this->ldap      = $ldap;
        $this->options = $options;
        $entityClass = $this->options->getUserEntityClass();
        $this->entity = new $entityClass();
    }

    /**
     * @see \ZfcUser\Mapper\User::findByUsername()
     */
    public function findByUsername($username)
    {
        return $this->entity;
    }
    
    /**
     * @see \ZfcUser\Mapper\User::findById()
     */
    public function findById($id)
    {
        return $this->entity;
    }

    /**
     * @see \ZfcUser\Mapper\User::findByEmail()
     */
    public function findByEmail($email)
    {
        return $this->entity;
    }
    
    /**
     * getEntity
     * 
     * @return ZfcUserAdLdap\Entity\User
     */
    public function getEntity()
    {
        return $this->entity;
    }
    
    /**
     * Authenticate the user, using the ADLDAP class
     * 
     * @param string $identity
     * @param string $credential
     * @return \ZfcUserAdLdap\Mapper\User|boolean
     */
    public function authenticate($identity,$credential){
        $auth = $this->ldap->authenticate($identity, $credential);
        if ($auth !== FALSE) { //If the login iformation is correct
            $this->entity->setId($auth[0]['objectsid'][0]);
			$this->entity->setUsername($auth[0]['samaccountname'][0]);
			$this->entity->setDisplayName($auth[0]['displayname'][0]);
			$this->entity->setFirstName($auth[0]['givenName'][0]);
			$this->entity->setLastName($auth[0]['sn'][0]);
            //@TODO Make the mail domain configurable
            if (isset($auth[0]['mail'][0])) {
                $mail_exp = explode('.', $auth[0]['mail'][0]);
            } else {
                $mail_exp[0] = 'trendshift';
                $mail_exp[1] = 'com';
            }
            $this->entity->setEmail($auth[0]['samaccountname'][0] . '@' . $mail_exp[count($mail_exp)-2] . '.' . $mail_exp[count($mail_exp)-1]);
            $this->entity->setPhoneNumber($auth[0]['mobile'][0]);
			
            return $this; 
       } else {
           return false;
       }
    }

    /**
     * @see \ZfcUser\Mapper\User::insert()
	 * // TrendShift authentication is using save below.
     */
    public function insert($entity, $tableName = null, HydratorInterface $hydrator = null)
    {
        return FALSE;
    }

    /**
     * @see \ZfcUser\Mapper\User::update()
	 * // TrendShift authentication is using save below.
     */
    public function update($entity, $where = null, $tableName = null, HydratorInterface $hydrator = null)
    {
        return FALSE;
    }
	
	// Checks for inserting or updating based on id.
	public function save($entity, $where = null, $tableName = null, HydratorInterface $hydrator = null) {
		if ($this->entity->getId() === null) {
			$result = $this->insert($this->entity, $this->getTableName(), $this->getHydrator());
		}
		else {
			$where = array('id' => $this->entity->getId());
			$result = $this->update($this->entity, $where, $this->getTableName(), $this->getHydrator());
		}
		return $result;
	}
}