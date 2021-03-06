<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\ClientCompany
 *
 * @property int $ID
 * @property string|null $CREATED_AT
 * @property string|null $UPDATED_AT
 * @property string $COMPANY_NAME
 * @property string $CONTACT_NAME
 * @property string $NIC
 * @property string $NIT
 * @method static Builder|ClientCompany newModelQuery()
 * @method static Builder|ClientCompany newQuery()
 * @method static Builder|ClientCompany query()
 * @method static Builder|ClientCompany whereCOMPANYNAME($value)
 * @method static Builder|ClientCompany whereCONTACTNAME($value)
 * @method static Builder|ClientCompany whereCREATEDAT($value)
 * @method static Builder|ClientCompany whereID($value)
 * @method static Builder|ClientCompany whereNIC($value)
 * @method static Builder|ClientCompany whereNIT($value)
 * @method static Builder|ClientCompany whereUPDATEDAT($value)
 * @mixin Eloquent
 */
class ClientCompany extends Model
{
    protected $guarded = ['id'];

    /*
     * Client Information for this Company Client
     */
    public function client(){
        return $this->belongsTo(Client::class, 'id', 'id');
    }
}
