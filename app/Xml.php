<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Xml extends Model
{
    protected $table = 'xml';
    protected $guarded = [];


       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $filliables = ['enrapport_id',
        'Lab_Name','Sample_No','Name','Farm_ID','Lot_name','Date_Printed','Type',
        'Desc_1','Desc_2','Desc_3','Product_code','Reference_No','DM','Moisture','CP',
        'SP_CP','SP','ADICP','ADICP_CP','NDICPns','NDICPns_CP','NDICP','NDICP_CP',
        'NH3CPE','NFC', 'Acetic', 'Propionic', 'Lactic', 'Total_acid', 'Sugar_ESC',
        'Sugar_WSC','Starch','rSTRD_IV_7hr_4mm','Starchkd','ADF','NDF',
        'aNDFom', 'NDFDom_IV_30hr', 'Lignin', 'Lignin_NDF', 'Fat_EE', 'TFA',
        'Ash','Ca','P','Mg','K','S','uNDFom_IV_12hr','uNDFom_IV_30hr','uNDFom_IV_120hr','uNDFom_IV_240hr','NDFDom_IV_12hr','NDFDom_IV_120hr','NDFDom_IV_240hr','NELMcallb','NELMcalkg','NELMJkg','NEMMcallb','NEMMcalkg','NEMMJkg','NEGMcallb','NEGMcalkg','NEGMJkg','TDN','MilktonCSn',
        'MilktonCSp','NEL_CSnMcallb','NEL_CSpMcallb','NEL_CSnMcalkg','NEL_CSpMcalkg','NEL_CSnMJkg','NEL_CSpMJkg',
        'C160','C180','C181','C182','C183','C160_TFA','C180_TFA','C181_TFA','C182_TFA','C183_TFA','pH'
    ];
    

    
    public function enrapport()
    {
        return $this->belongsTo(Enrapport::class);
    }


}