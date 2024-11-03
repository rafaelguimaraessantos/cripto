<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Cripto; 

    class DashboardController extends Controller
    {
        public function index()
        {
            $criptos = Cripto::all(); // Recupera todas as criptomoedas
            return view('dashboard', compact('criptos')); // Passa as criptomoedas para a view
        }
        public function  dashboard() {
            return view('dashboard'); // Crie essa view como uma área protegida
        }
      
    }

