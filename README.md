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

Demo
====

An online demo of the functionality can be found here

http://164.177.147.127:8081/openbooking/src/

Admin area login : admin / password




