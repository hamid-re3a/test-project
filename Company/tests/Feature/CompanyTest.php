<?php


namespace Company\tests\Feature;


use User\Models\User;

class CompanyTest extends \Company\tests\CompanyTest
{

    /**
     * @test
     */
    public function create_new_province()
    {
        $user = User::factory()->create();
        $this->be($user);
        $res = $this->post(route('customer.provinces.store'), [
            'name' => 'tehran'
        ]);
        $res->assertOk();

        $this->assertDatabaseHas('provinces', [
            'name' => 'tehran'
        ]);
    }

    /**
     * @test
     */
    public function delete_new_province()
    {
        $user = User::factory()->create();
        $this->be($user);
        $res = $this->post(route('customer.provinces.store'), [
            'name' => 'tehran'
        ]);
        $res->assertOk();

        $this->delete(route('customer.provinces.destroy', ['province' => $res->json()['data']['id']]))->assertOk();
    }


    /**
     * @test
     */
    public function create_new_city()
    {
        $user = User::factory()->create();
        $this->be($user);
        $res = $this->post(route('customer.provinces.store'), [
            'name' => 'tehran'
        ]);

        $res->assertOk();
        $res_city = $this->post(route('customer.cities.store'), [
            'name' => 'tehran',
            'province_id' => $res->json()['data']['id']
        ]);
        $res_city->assertOk();
        $this->assertDatabaseHas('cities', [
            'name' => 'tehran'
        ]);

    }

    /**
     * @test
     */
    public function create_new_company()
    {
        $user = User::factory()->create();
        $this->be($user);
        $res = $this->post(route('customer.provinces.store'), [
            'name' => 'tehran'
        ]);

        $res->assertOk();
        $res_city = $this->post(route('customer.cities.store'), [
            'name' => 'tehran',
            'province_id' => $res->json()['data']['id']
        ]);
        $res_city->assertOk();
        $this->assertDatabaseHas('cities', [
            'name' => 'tehran'
        ]);

        $res_company = $this->post(route('customer.companies.store'), [
            'name' => 'New',
            'phone_number' => '0219383832',
            'city_id' => $res_city->json()['data']['id']
        ]);
        $this->assertDatabaseHas('companies', [
            'name' => 'New'
        ]);

    }


    /**
     * @test
     */
    public function show_new_company()
    {
        $user = User::factory()->create();
        $this->be($user);
        $res = $this->post(route('customer.provinces.store'), [
            'name' => 'tehran'
        ]);

        $res->assertOk();
        $res_city = $this->post(route('customer.cities.store'), [
            'name' => 'tehran',
            'province_id' => $res->json()['data']['id']
        ]);
        $res_city->assertOk();
        $this->assertDatabaseHas('cities', [
            'name' => 'tehran'
        ]);

        $res_company = $this->post(route('customer.companies.store'), [
            'name' => 'New',
            'phone_number' => '0219383832',
            'city_id' => $res_city->json()['data']['id']
        ]);
        $this->assertDatabaseHas('companies', [
            'name' => 'New'
        ]);

        $res_company_show = $this->get(route('customer.companies.show', [
            'company' => $res_company->json()['data']['id']
        ]));
        $res_company_show->assertJsonStructure([
            "status",
            "message",
            "data" => [
                "id",
                "name",
                "phone_number",
                "city",
                "province"
            ]
        ]);

    }
}
