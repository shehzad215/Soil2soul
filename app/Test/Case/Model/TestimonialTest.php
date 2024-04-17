<?php
App::uses('Testimonial', 'Model');

/**
 * Testimonial Test Case
 *
 */
class TestimonialTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.testimonial',
		'app.doctor',
		'app.doctor_type',
		'app.consult_type',
		'app.designation',
		'app.user',
		'app.doctor_external_link',
		'app.degree',
		'app.doctors_degree',
		'app.location',
		'app.doctors_location',
		'app.specialty',
		'app.doctors_specialty',
		'app.country',
		'app.country_detail',
		'app.timezone'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Testimonial = ClassRegistry::init('Testimonial');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Testimonial);

		parent::tearDown();
	}

}
