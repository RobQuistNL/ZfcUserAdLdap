<?php

namespace ZfcUserAdLdapTest\Entity;

use ZfcUserAdLdap\Entity\User as Entity;

class UserEntityTest extends \PHPUnit_Framework_TestCase
{
    protected $user;

    public function setUp()
    {
        $user = new Entity;
        $this->user = $user;
    }
	
	/**
	* Verifies initial empty/null state.
	* 
	*/
	public function testUserInitialState()
    {
        $this->assertNull(
            $this->user->getId(),
            '"id" should initially be null'
        );
		$this->assertNull(
            $this->user->getUsername(),
            '"username" should initially be null'
        );
		$this->assertNull(
            $this->user->getDisplayName(),
            '"displayname" should initially be null'
        );
		$this->assertNull(
            $this->user->getEmail(),
            '"email" should initially be null'
        );
		$this->assertNull(
            $this->user->getPassword(),
            '"password" should initially be null'
        );
		$this->assertNull(
            $this->user->getState(),
            '"state" should initially be null'
        );
		$this->assertNull(
            $this->user->getPassword(),
            '"password" should initially be null'
        );
		$this->assertNull(
            $this->user->getPhoneNumber(),
            '"phonenumber" should initially be null'
        );
    }

    /**
     * @covers ZfcUser\Entity\User::setId
     * @covers ZfcUser\Entity\User::getId
     */
    public function testSetGetId()
    {
        $this->user->setId(1);
        $this->assertEquals(1, $this->user->getId());
		return $this->user->getId();
    }

    /**
     * @covers ZfcUser\Entity\User::setUsername
     * @covers ZfcUser\Entity\User::getUsername
     */
    public function testSetGetUsername()
    {
        $this->user->setUsername('zfcadldapUser');
        $this->assertEquals('zfcadldapUser', $this->user->getUsername());
		return $this->user->getUserName();
    }

    /**
     * @covers ZfcUser\Entity\User::setDisplayName
     * @covers ZfcUser\Entity\User::getDisplayName
     */
    public function testSetGetDisplayName()
    {
        $this->user->setDisplayName('Zfc Ldap User');
        $this->assertEquals('Zfc Ldap User', $this->user->getDisplayName());
		return $this->user->getDisplayName();
    }

    /**
     * @covers ZfcUser\Entity\User::setEmail
     * @covers ZfcUser\Entity\User::getEmail
     */
    public function testSetGetEmail()
    {
        $this->user->setEmail('admin@trendshift.com');
        $this->assertEquals('admin@trendshift.com', $this->user->getEmail());
		return $this->user->getEmail();
    }

    /**
     * @covers ZfcUser\Entity\User::setPassword
     * @covers ZfcUser\Entity\User::getPassword
     */
    public function testSetGetPassword()
    {
        $this->user->setPassword('zfcUserPassword');
        $this->assertEquals('zfcUserPassword', $this->user->getPassword());
		return $this->user->getPassword();
    }

    /**
     * @covers ZfcUser\Entity\User::setState
     * @covers ZfcUser\Entity\User::getState
     */
    public function testSetGetState()
    {
        $this->user->setState(1);
        $this->assertEquals(1, $this->user->getState());
		return $this->user->getState();
    }
	
	/**
	* @covers ZfcUser\Entity\User::setPhoneNumber
	* @covers ZfcUser\Entity\User::getPhoneNumber
	*/
    public function testSetGetPhoneNumber()
    {
        $this->user->setPhoneNumber('0000000000');
        $this->assertEquals('0000000000', $this->user->getPhoneNumber());
		return $this->user->getPhoneNumber();
    }
	
	/**
	 * @covers ZfcUserAdLdap\Entity\User::toArray
	 * 
	 * @depends testSetGetId
	 * @depends testSetGetUserName
	 * @depends testSetGetDisplayName
	 * @depends testSetGetEmail
	 * @depends testSetGetPassword
	 * @depends testSetGetState
	 * @depends testSetGetPhoneNumber
	 */
	public function testToArray() {
		// Build test array here.
		$this->user->setId(1);
		$this->user->setUserName('zfcadldapUser');
		$this->user->setDisplayName('Zfc Ldap User');
		$this->user->setEmail('admin@trendshift.com');
		$this->user->setPassword('zfcUserPassword');
		$this->user->setState(1);
		$this->user->setPhoneNumber('0000000000');
		// Return all gets in this class from the @depends annotation.
		$setup_data = func_get_args();
		// Finally, is the method returning correctly?
		$toarray_data = $this->user->toArray();
		$this->assertEquals($setup_data, \array_values($toarray_data));
	}
}