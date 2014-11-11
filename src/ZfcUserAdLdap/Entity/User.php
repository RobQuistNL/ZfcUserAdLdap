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

use ZfcUser\Entity\User as ZfcUserEntity;

class User extends ZfcUserEntity {
	/**
	 * @var string
	 */
	protected $phoneNumber;
	
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
}