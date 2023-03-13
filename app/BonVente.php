<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Client;
use App\Product;
use Carbon\Carbon;
use DateTime;

class BonVente extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class,'bon_vente_product')->withPivot(['quantite','montantTotal','prixVente','montantGained'])->withTimestamps();;
    }

    public function versements(){
       return $this->hasMany(Versement::class);
    }

   public function get_created_at($d)
   {
      return DateTime::createFromFormat('Y-m-d H:i:s', $d)->format('d-m-Y H:i:s');;
   }

   public function get_created_at_regular($d)
   {
      return DateTime::createFromFormat('Y-m-d H:i:s', $d)->format('d-m-Y');
   }

      public static function search($search,$client,$date,$paiement){
            if($paiement == 'complet') {
                  if(empty($search) && empty($client) && empty($date)) { return static::where('montantReste',0); }
                  else if(!empty($search) && empty($client) && empty($date)) { return static::where('montantTotal','like','%'.$search.'%')->orWhere('montantPayer','like','%'.$search.'%')->orWhere('montantReste','like','%'.$search.'%')->where('montantReste',0); }
                  else if(empty($search) && !empty($client) && empty($date)) { return static::whereHas('client',function($q)use($client){$q->where('id',$client);})->where('montantReste',0);}
                  else if(empty($search) && empty($client) && !empty($date)) { return static::whereDate('created_at','=',$date)->where('montantReste',0) ; }
                  else if(!empty($search) && !empty($client) && empty($date)) { return static::where('montantTotal','like','%'.$search.'%')->orWhere('montantPayer','like','%'.$search.'%')->orWhere('montantReste','like','%'.$search.'%')->whereHas('client',function($q)use($client){$q->where('id',$client);})->where('montantReste',0) ;}
                  else if(!empty($search) && empty($client) && !empty($date)) { return static::where('montantTotal','like','%'.$search.'%')->orWhere('montantPayer','like','%'.$search.'%')->orWhere('montantReste','like','%'.$search.'%')->whereDate('created_at','=',$date)->where('montantReste',0) ; }
                  else if(empty($search) && !empty($client) && !empty($date)) {return static::whereHas('client',function($q)use($client){$q->where('id',$client);})->whereDate('created_at','=',$date)->where('montantReste',0) ;}
                  else {return static::where('montantTotal','like','%'.$search.'%')->orWhere('montantPayer','like','%'.$search.'%')->orWhere('montantReste','like','%'.$search.'%')->whereHas('client',function($q)use($client){$q->where('id',$client);})->whereDate('created_at','=',$date)->where('montantReste',0) ;}

            }else if($paiement == 'dette'){
                  if(empty($search) && empty($client) && empty($date)) { return static::where('montantReste','<',0); }
                  else if(!empty($search) && empty($client) && empty($date)) { return static::where('montantTotal','like','%'.$search.'%')->orWhere('montantPayer','like','%'.$search.'%')->orWhere('montantReste','like','%'.$search.'%')->where('montantReste','<',0); }
                  else if(empty($search) && !empty($client) && empty($date)) { return static::whereHas('client',function($q)use($client){$q->where('id',$client);})->where('montantReste','<',0);}
                  else if(empty($search) && empty($client) && !empty($date)) { return static::whereDate('created_at','=',$date)->where('montantReste','<',0) ; }
                  else if(!empty($search) && !empty($client) && empty($date)) { return static::where('montantTotal','like','%'.$search.'%')->orWhere('montantPayer','like','%'.$search.'%')->orWhere('montantReste','like','%'.$search.'%')->whereHas('client',function($q)use($client){$q->where('id',$client);})->where('montantReste','<',0) ;}
                  else if(!empty($search) && empty($client) && !empty($date)) { return static::where('montantTotal','like','%'.$search.'%')->orWhere('montantPayer','like','%'.$search.'%')->orWhere('montantReste','like','%'.$search.'%')->whereDate('created_at','=',$date)->where('montantReste','<',0) ; }
                  else if(empty($search) && !empty($client) && !empty($date)) {return static::whereHas('client',function($q)use($client){$q->where('id',$client);})->whereDate('created_at','=',$date)->where('montantReste','<',0) ;}
                  else {return static::where('montantTotal','like','%'.$search.'%')->orWhere('montantPayer','like','%'.$search.'%')->orWhere('montantReste','like','%'.$search.'%')->whereHas('client',function($q)use($client){$q->where('id',$client);})->whereDate('created_at','=',$date)->where('montantReste','<',0) ;}

            }else {
                  if(empty($search) && empty($client) && empty($date)) { return static::query(); }
                  else if(!empty($search) && empty($client) && empty($date)) { return static::where('montantTotal','like','%'.$search.'%')->orWhere('montantPayer','like','%'.$search.'%')->orWhere('montantReste','like','%'.$search.'%'); }
                  else if(empty($search) && !empty($client) && empty($date)) { return static::whereHas('client',function($q)use($client){$q->where('id',$client);});}
                  else if(empty($search) && empty($client) && !empty($date)) { return static::whereDate('created_at',$date) ; }
                  else if(!empty($search) && !empty($client) && empty($date)) { return static::where('montantTotal','like','%'.$search.'%')->orWhere('montantPayer','like','%'.$search.'%')->orWhere('montantReste','like','%'.$search.'%')->whereHas('client',function($q)use($client){$q->where('id',$client);}) ;}
                  else if(!empty($search) && empty($client) && !empty($date)) { return static::where('montantTotal','like','%'.$search.'%')->orWhere('montantPayer','like','%'.$search.'%')->orWhere('montantReste','like','%'.$search.'%')->whereDate('created_at',$date) ; }
                  else if(empty($search) && !empty($client) && !empty($date)) {return static::whereHas('client',function($q)use($client){$q->where('id',$client);})->whereDate('created_at',$date) ;}
                  else {return static::where('montantTotal','like','%'.$search.'%')->orWhere('montantPayer','like','%'.$search.'%')->orWhere('montantReste','like','%'.$search.'%')->whereHas('client',function($q)use($client){$q->where('id',$client);})->whereDate('created_at',$date) ;}

            }
      }

      public function updateMontantBonVente($montantTotal = null,$montantVerse = null,$op = null){
         $bon = BonVente::find($this->id);

         if($montantTotal != null){
            $mTotal = !is_null($op) && $op == 'remove' ? $bon->montantTotal - $montantTotal : $bon->montantTotal + $montantTotal;
            $mTotal = $mTotal > 0 ? $mTotal : 0 ;
            $bon->update([
               'montantTotal' => $mTotal ,

            ]);
         }

         if($montantVerse != null){
            $payer = $montantVerse + $bon->montantPayer ;
            $montantReste = $bon->montantTotal - $payer ;

            $bon->update([
               'montantPayer' => $payer,
            ]);
         }

         $montantReste = $bon->montantTotal - $bon->montantPayer ;

         $bon->update([
            'montantReste' => $montantReste,
         ]);
      }

      public function updateMontantNetBonVente($montantGained = null,$montantVerse = null,$op = null){
         $bon = BonVente::find($this->id);

         if($montantGained != null){
            $mTotal = !is_null($op) && $op == 'remove' ? $bon->montantGained - $montantGained : $bon->montantGained + $montantGained;
            $mTotal = $mTotal > 0 ? $mTotal : 0 ;
            $bon->update([
               'montantNetTotal' => $mTotal ,
            ]);
         }
      }

      public static function sumMontantGlobal($dateDebut,$dateFin){
         return DB::table('bon_ventes')->whereBetween('created_at', [$dateDebut . ' 00:00:00', $dateFin . ' 23:59:59'])
                     ->selectRaw('sum(montantTotal) as sommeMontantGlobal')
                     ->first()
                     ->sommeMontantGlobal;
      }

      public static function sumMontantNetGlobal($dateDebut,$dateFin){
         return DB::table('bon_ventes')->whereBetween('created_at', [$dateDebut . ' 00:00:00', $dateFin . ' 23:59:59'])
                     ->selectRaw('sum(montantNetTotal) as sommeMontantNetGlobal')
                     ->first()
                     ->sommeMontantNetGlobal;
      }
}
