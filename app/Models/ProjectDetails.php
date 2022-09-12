<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class ProjectDetails extends Model
{
    use HasFactory,Notifiable, HasRoles;
    protected $fillable=[
        'project_id',
        'funding_agency_id',
        'create_user_id',
    ];
    public function project(){
        return $this->belongsTo(Project::class,'project_id','id');
    }
    public function fundingagency(){
        return $this->belongsTo(FundingAgency::class,'funding_agency_id','id');

    }
    public function createuser(){
        return $this->belongsTo(CreateUser::class,'create_user_id','id');
    }
}
