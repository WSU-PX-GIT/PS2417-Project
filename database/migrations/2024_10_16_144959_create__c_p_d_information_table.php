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
            $table->id('cpd_id')->primary()->autoIncrement();
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
            $table->id('qualification_id')->primary()->autoIncrement();
            $table->string('qualification_name')->nullable(false);
            $table->string('state_or_territory');
            $table->string('state_abbreviation');
            $table->string('truncated_name');
            $table->string('CPD_unit');
            $table->date('expiry_renewal_date');
            $table->dateTime('last_updated');
            $table->timestamps();
        });
        Schema::create('QualificationsCategory', function (Blueprint $table) {
            $table->id('category_id')->primary()->autoIncrement();
            $table->integer('qualification_id');
            $table->foreign('qualification_id')->references('qualification_id')->on('QualificationsDetails');
            $table->string('category_name')->nullable(false);
        });
        Schema::create('CPDReport', function (Blueprint $table) {
            $table->id('cpd_id')->primary()->autoIncrement();
            $table->string('cpd_name')->nullable(false);
            $table->foreign('qualification_id')->references('qualification_id')->on('QualificationsDetails');
            $table->string('qualification_name');
            $table->string('qualification_category');
            $table->string('cpd_type');
            $table->boolean('is_cpd_evidence_attached');
            $table->text('cpd_evidence');
            $table->year('CPD_year');
            $table->year('year_completed');
            $table->dateTime('last_updated');
            $table->boolean('record_status');
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
