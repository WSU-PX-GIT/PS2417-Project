<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('CPDInformation', function (Blueprint $table) {
            $table->id('cpd_id')->autoIncrement();
            $table->integer('qualification_id');
            $table->string('has_cpd_requirement');
            $table->string('cpd_evidence_retention_period');
            $table->text('cpd_exemptions');
            $table->string('cpd_units');
            $table->year('current_cpd_year');
            $table->foreign('qualification_id')->references('qualification_id')->on('QualificationDetails');
            $table->timestamps();
        });
        Schema::create('QualificationsDetails', function (Blueprint $table) {
            $table->id('qualification_id')->autoIncrement();
            $table->string('qualification_name')->nullable(false);
            $table->string('state_or_territory');
            $table->string('state_abbreviation');
            $table->string('truncated_name');
            $table->string('CPD_unit');
            $table->date('expiry_renewal_date');
            $table->integer('retention_period');
            $table->dateTime('last_updated');
            $table->timestamps();
        });
        Schema::create('QualificationsCategory', function (Blueprint $table) {
            $table->id('category_id')->autoIncrement();
            $table->integer('qualification_id');
            $table->foreign('qualification_id')->references('qualification_id')->on('QualificationsDetails');
            $table->string('category_name')->nullable(false);
        });
        Schema::create('CPDReport', function (Blueprint $table) {
            $table->id('cpd_id')->autoIncrement();
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('cpd_name')->nullable(false);
            $table->integer('qualification_id');
            $table->foreign('qualification_id')->references('qualification_id')->on('QualificationsDetails');
            $table->string('cpd_type');
            $table->integer('units');
            $table->boolean('is_cpd_evidence_attached');
            $table->text('cpd_evidence');
            $table->date('expiry_date');
            $table->year('CPD_year');
            $table->year('year_completed');
            $table->dateTime('last_updated');
            $table->boolean('record_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CPDInformation');
    }
};