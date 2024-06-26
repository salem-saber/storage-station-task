<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShippingAwb>
 */
class ShippingAwbFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'shipping_company' => $this->faker->randomElement(['aramex', 'JT_Express', 'third_mile', 'bolesa', 'smsa', 'kwickbox', 'tabex', 'adwar', 'smsa_cold', 'adwar_cold']),
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'payment_type' => $this->faker->randomElement(['cod', 'cc']),
            'shipper_name' => $this->faker->name,
            'shipper_company_name' => $this->faker->company,
            'shipper_address_line_1' => $this->faker->streetAddress,
            'shipper_line_2' => $this->faker->optional()->secondaryAddress,
            'shipper_line_3' => $this->faker->optional()->secondaryAddress,
            'shipper_city' => $this->faker->city,
            'shipper_state_or_province_code' => $this->faker->stateAbbr,
            'shipper_post_code' => $this->faker->postcode,
            'shipper_country_code' => $this->faker->countryCode,
            'shipper_phone' => $this->faker->phoneNumber,
            'shipper_email' => $this->faker->optional()->email,

            'consignee_name' => $this->faker->name,
            'consignee_company_name' => $this->faker->optional()->company,
            'consignee_address_line_1' => $this->faker->streetAddress,
            'consignee_line_2' => $this->faker->optional()->secondaryAddress,
            'consignee_line_3' => $this->faker->optional()->secondaryAddress,
            'consignee_city' => $this->faker->city,
            'consignee_state_or_province_code' => $this->faker->stateAbbr,
            'consignee_post_code' => $this->faker->postcode,
            'consignee_country_code' => $this->faker->countryCode,
            'consignee_phone' => $this->faker->phoneNumber,
            'consignee_email' => $this->faker->optional()->email,

            'awb_reference' => $this->faker->regexify('[A-Z0-9]{7}'),
            'description' => $this->faker->sentence,
            'tracking_number' => $this->faker->regexify('[0-9]{12}'),
            'label' => $this->faker->regexify('[0-9]{12}'),
            'store_name' => $this->faker->company,
            'order_number' => $this->faker->regexify('[A-Z0-9]{7}'),
            'is_delivered' => $this->faker->boolean,
            'is_paid' => $this->faker->boolean,

            'user_id' => \App\Models\User::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
