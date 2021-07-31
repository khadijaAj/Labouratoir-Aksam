<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXmlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xml', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Lab_Name')->nullable();
            $table->string('Sample_No')->nullable();
            $table->string('Name')->nullable();
            $table->string('Farm_ID')->nullable();
            $table->string('Lot_name')->nullable();
            $table->date('Date_Printed')->nullable();
            $table->string('Type')->nullable();
            $table->string('Desc_1')->nullable();
            $table->string('Desc_2')->nullable();
            $table->string('Desc_3')->nullable();
            $table->string('Product_code')->nullable();
            $table->string('Reference_No')->nullable();
            $table->float('DM')->nullable();
            $table->float('Moisture')->nullable();
            $table->float('CP')->nullable();
            $table->float('SP_CP')->nullable();
            $table->float('SP')->nullable();
            $table->float('ADICP')->nullable();
            $table->float('ADICP_CP')->nullable();
            $table->float('NDICPns')->nullable();
            $table->float('NDICPns_CP')->nullable();
            $table->float('NDICP')->nullable();
            $table->float('NDICP_CP')->nullable();
            $table->float('NH3CPE')->nullable();
            $table->float('NFC')->nullable();
            $table->float('Acetic')->nullable();
            $table->float('Propionic')->nullable();
            $table->float('Lactic')->nullable();
            $table->float('Total_acid')->nullable();
            $table->float('Sugar_ESC')->nullable();
            $table->float('Sugar_WSC')->nullable();
            $table->float('Starch')->nullable();
            $table->float('rSTRD_IV_7hr_4mm')->nullable();
            $table->float('Starchkd')->nullable();
            $table->float('ADF')->nullable();
            $table->float('NDF')->nullable();
            $table->float('aNDFom')->nullable();
            $table->float('NDFDom_IV_30hr')->nullable();
            $table->float('Lignin')->nullable();
            $table->float('Lignin_NDF')->nullable();
            $table->float('Fat_EE')->nullable();
            $table->float('TFA')->nullable();
            $table->float('Ash')->nullable();
            $table->float('Ca')->nullable();
            $table->float('P')->nullable();
            $table->float('Mg')->nullable();
            $table->float('K')->nullable();
            $table->float('S')->nullable();
            $table->float('uNDFom_IV_12hr')->nullable();
            $table->float('uNDFom_IV_30hr')->nullable();
            $table->float('uNDFom_IV_120hr')->nullable();
            $table->float('uNDFom_IV_240hr')->nullable();
            $table->float('NDFDom_IV_12hr')->nullable();
            $table->float('NDFDom_IV_120hr')->nullable();
            $table->float('NDFDom_IV_240hr')->nullable();
            $table->float('NELMcallb')->nullable();
            $table->float('NELMcalkg')->nullable();
            $table->float('NELMJkg')->nullable();
            $table->float('NEMMcallb')->nullable();
            $table->float('NEMMcalkg')->nullable();
            $table->float('NEMMJkg')->nullable();
            $table->float('NEGMcallb')->nullable();
            $table->float('NEGMcalkg')->nullable();
            $table->float('NEGMJkg')->nullable();
            $table->float('TDN')->nullable();
            $table->float('MilktonCSn')->nullable();
            $table->float('MilktonCSp')->nullable();
            $table->float('NEL_CSnMcallb')->nullable();
            $table->float('NEL_CSpMcallb')->nullable();
            $table->float('NEL_CSnMcalkg')->nullable();
            $table->float('NEL_CSpMcalkg')->nullable();
            $table->float('NEL_CSnMJkg')->nullable();
            $table->float('NEL_CSpMJkg')->nullable();
            $table->float('C160')->nullable();
            $table->float('C180')->nullable();
            $table->float('C181')->nullable();
            $table->float('C182')->nullable();
            $table->float('C183')->nullable();
            $table->float('C160_TFA')->nullable();
            $table->float('C180_TFA')->nullable();
            $table->float('C181_TFA')->nullable();
            $table->float('C182_TFA')->nullable();
            $table->float('C183_TFA')->nullable();
            $table->float('pH')->nullable();
            $table->integer('enrapport_id')->nullable()->unsigned();

            $table->foreign('enrapport_id')->references('id')->nullable()->on('enrapports')->onDelete('cascade');
            $table->timestamps();
        });
    

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xml');
    }
}
