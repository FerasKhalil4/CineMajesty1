<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    
    protected $table='customers';
    protected $primaryKey='C_id';
    protected $fillable = ['f_name', 'l_name', 'email', 'password', 'age', 'gender','tickets_num','rate'];   
    //  public function Role(){

    //     return $this->belongsTo(Role::class,'R_id','R_id');
    // }
    public function Bookings(){

        return $this->hasMany(Booking::class,'C_id','C_id');
    }

    public function rates(){

        return $this->belongstomany(Film::class,'rating','C_id','F_id');
    }
  
    public function comments(){

        return $this->belongstomany(Film::class,'commenting','C_id','F_id');
    }

    public function Wallet(){

        return $this->hasOne(Wallet::class,'C_id','C_id');
    }
    public function PrivateOffers(){

        return $this->hasMany(PrivateOffer::class,'C_id','C_id');
    }
    public function ScopeByPerson($query,$person)
    {
        return $query->where('f_name', 'like', '%' . $person . '%')
        ->orWhere('l_name', 'like', '%' . $person . '%')
        ->orWhereRaw("CONCAT(f_name, ' ', l_name) LIKE ?", ['%' . $person . '%']);
    }

}
