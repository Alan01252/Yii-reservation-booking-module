Yii Reservation booking module.
===========

This is a module which allows a Yii based application to book online.

The module is still in alpha state.

Features
========
Manage reservations online.

Makes sure reservations cannot be duplicated

Set room prices

Set room types

Installation
============

cd path_to_application

    git submodule add git://github.com/Alan01252/Yii-reservation-booking-module.git protected/modules/openbooking/

Install the database

    mysql -u username -p databasename < protected/modules/openbooking/data/yii-booking.sql

Edit protected/config/main.php

In the modules array add

    'openbooking'=>array(
							 'reservationbehaviors'=> array(
															'DateOverlap',
															),
		),
		
Add the following to the navigation menu

	array('label'=>'Book Now', 'url'=>array('/openbooking/reservation/available'), 'visible'=>Yii::app()->user->isGuest),
	//Links to the room detail page	
	array('label'=>'Room', 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest,'items'=>array(
			array('label'=>'Types','url'=>array('/openbooking/roomType/index')),
			array('label'=>'Charges','url'=>array('/openbooking/roomCharge/index')),
			),
	),
	//Links involving registrations
	array('label'=>'Reservations', 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
			array('label'=>'Reservation Sheet','url'=>array('/openbooking/reservationSheet/index')),
			array('label'=>'Create','url'=>array('/openbooking/reservation/create')),
			),
	),
					

Demo
====

An online demo of the functionality can be found here

http://164.177.147.127:8081/openbooking/src/

Admin area login : admin / password




