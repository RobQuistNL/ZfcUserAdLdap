<?php
/**
 * This file is part of the ZfcUserAdLdap Module (https://github.com/RobQuistNL/ZfcUserAdLdap)
 *
 * Copyright (c) 2013 Rob Quist (https://github.com/RobQuistNL)
 *
 * For the full copyright and license information, please view
 * the file LICENSE.txt that was distributed with this source code.
 */
namespace ZfcUserAdLdap\Entity;

use ZfcUser\Entity\User as ZfcUserAdEntity;

class User extends ZfcUserAdEntity {
	/**
	 * @var string
	 */
	protected $phoneNumber;
	
	/**
	 * @var string
	 */
	protected $firstName;
	
	/**
	 * @var string
	 */
	protected $lastName;
	
	/**
	 * @var string
	 */
	protected $lastLogin;
	
	/**
	 * @var string
	 */
	protected $isAdmin;
	
	/**
	 * @var string
	 */
	protected $lastIp;

	/**
	 * Get phone number.
	 *
	 * @return string
	 */
	public function getPhoneNumber()
	{
		return $this->phoneNumber;
	}
	
	/**
	 * Set phone number.
	 *
	 * @param string $phoneNumber
	 * @return UserInterface
	 */
	public function setPhoneNumber($phoneNumber)
	{
		$this->phoneNumber = $phoneNumber;
		return $this;
	}
	
	/**
	 * Get first name.
	 *
	 * @return string
	 */
	public function getFirstName()
	{
		return $this->firstName;
	}
	
	/**
	 * Set first name.
	 *
	 * @param string $firstName
	 * @return UserInterface
	 */
	public function setFirstName($firstName)
	{
		$this->firstName = $firstName;
		return $this;
	}
	
	/**
	 * Get last name.
	 *
	 * @return string
	 */
	public function getLastName()
	{
		return $this->lastName;
	}
	
	/**
	 * Set last name.
	 *
	 * @param string $lastName
	 * @return UserInterface
	 */
	public function setLastName($lastName)
	{
		$this->lastName = $lastName;
		return $this;
	}
	
	/**
	 * Get last login time.
	 *
	 * @return string
	 */
	public function getLoginTime()
	{
		return $this->lastLogin;
	}
	
	/**
	 * Set last login time.
	 *
	 * @param string $lastLogin
	 * @return UserInterface
	 */
	public function setLoginTime($lastLogin)
	{
		$this->lastLogin = $lastLogin;
		return $this;
	}

	/**
	 * Get last login ip.
	 *
	 * @return string
	 */
	public function getLastIp() {
		return $this->lastIp;
	}

	/**
	 * Set last login ip.
	 *
	 * @param string $lastIp
	 * @return UserInterface
	 */
	public function setLastIp($lastIp) {
		$this->lastIp = $lastIp;
		return $this;
	}
}