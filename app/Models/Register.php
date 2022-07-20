<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'lastname', 'description', 'email', 'phone', 'photo', 'status', 'type',
        'bill_number', 'bill_date', 'bill_nip', 'code', 'prize', 'bill_photo', 'account_number', 'city', 'street',
        'zip_code', 'mail_send', 'document_pesel', 'document_number', 'document_type', 'parental_name', 'parental_consent', 'is_eighteen',
        'expiration_date', 'shop', 'ip_address'];


}
