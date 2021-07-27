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
            $table->string('Lab_Name');
            $table->string('Sample_No');
            $table->string('Name');
            $table->string('Farm_ID');
            $table->string('Lot_name');
            $table->date('Date_Printed');
            $table->string('Type');
            $table->string('Desc_1');
            $table->string('Desc_2');
            $table->string('Desc_3');
            $table->integer('Product_code');
            $table->string('Reference_No');
            $table->float('DM');
            $table->float('Moisture');
            $table->float('CP');
            $table->float('SP_CP');
            $table->float('SP');
            $table->float('ADICP');
            $table->float('ADICP_CP');
            $table->float('NDICPns');
            $table->float('NDICPns_CP');
            $table->float('NDICP');
            $table->float('NDICP_CP');
            $table->float('NH3CPE');
            $table->float('NFC');
            $table->float('Acetic');
            $table->float('Propionic');
            $table->float('Lactic');
            $table->float('Total_acid');
            $table->float('Sugar_ESC');
            $table->float('Sugar_WSC');
            $table->float('Starch');
            $table->float('rSTRD_IV_7hr_4mm');
            $table->float('Starchkd');
            $table->float('ADF');
            $table->float('NDF');
            $table->float('aNDFom');
            $table->float('NDFDom_IV_30hr');
            $table->float('Lignin');
            $table->float('Lignin_NDF');
            $table->float('Fat_EE');
            $table->float('TFA');
            $table->float('Ash');
            $table->float('Ca');
            $table->float('P');
            $table->float('Mg');
            $table->float('K');
            $table->float('S');
            $table->float('uNDFom_IV_12hr');
            $table->float('uNDFom_IV_30hr');
            $table->float('uNDFom_IV_120hr');
            $table->float('uNDFom_IV_240hr');
            $table->float('NDFDom_IV_12hr');
            $table->float('NDFDom_IV_120hr');
            $table->float('NDFDom_IV_240hr');
            $table->float('NELMcallb');
            $table->float('NELMcalkg');
            $table->float('NELMJkg');
            $table->float('NEMMcallb');
            $table->float('NEMMcalkg');
            $table->float('NEMMJkg');
            $table->float('NEGMcallb');
            $table->float('NEGMcalkg');
            $table->float('NEGMJkg');
            $table->float('TDN');
            $table->float('MilktonCSn');
            $table->float('MilktonCSp');
            $table->float('NEL_CSnMcallb');
            $table->float('NEL_CSpMcallb');
            $table->float('NEL_CSnMcalkg');
            $table->float('NEL_CSpMcalkg');
            $table->float('NEL_CSnMJkg');
            $table->float('NEL_CSpMJkg');
            $table->float('C160');
            $table->float('C180');
            $table->float('C181');
            $table->float('C182');
            $table->float('C183');
            $table->float('C160_TFA');
            $table->float('C180_TFA');
            $table->float('C181_TFA');
            $table->float('C182_TFA');
            $table->float('C183_TFA');
            $table->float('pH');
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
