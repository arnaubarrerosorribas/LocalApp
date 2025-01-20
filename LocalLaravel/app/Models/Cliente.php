<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;

    class Cliente extends Authenticatable {
        use HasFactory, Notifiable;

        protected $table = 'cliente';

        protected $fillable = [
            'name', 'apellidos', 'email', 'phone',
            'password', 'street_address', 'ciudad', 'provincia',
            'codigo_postal', 'numero_planta', 'numero_puerta', 'puntos',
        ];

        protected $hidden = [ 'password', 'remember_token', ];

        protected $casts = [
            'email_verified_at' => 'datetime',
            'phone_verified_at' => 'datetime',
        ];

        public function categoriaGeneral() {
            return $this->belongsTo(CategoriaGeneral::class, 'categorias_generales');
        }

        public function comercios() {
            return $this->hasMany(Comercio::class, 'id_cliente');
        }
    }