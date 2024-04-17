<?php
App::uses('DoctorsAgeGroup', 'Model');

/**
 * DoctorsAgeGroup Test Case
 *
 */
class DoctorsAgeGroupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.doctors_age_group',
		'app.doctor',
		'app.doctor_type',
		'app.consult_type',
		'app.designation',
		'app.user',
		'app.doctor_external_link',
		'app.testimonial',
		'app.country',
		'app.country_detail',
		'app.timezone',
		'app.degree',
		'app.doctors_degree',
		'app.location',
		'app.doctors_location',
		'app.specialty',
		'app.doctors_specialty',
		'app.age_group'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DoctorsAgeGroup = ClassRegistry::init('DoctorsAgeGroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DoctorsAgeGroup);

		parent::tearDown();
	}

}
