<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Http;

class ImportDataFromCSV extends Migration
{
    public function up()
    {
        // Scarica il file CSV
        $csvFile = Http::get('https://www.istat.it/storage/codici-unita-amministrative/Elenco-comuni-italiani.csv')->body();

        // Crea la tabella "regioni"
        Schema::create('regioni', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_regione');
            $table->timestamps();
        });

        // Crea la tabella "province"
        Schema::create('province', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_provincia');
            $table->string('sigla');
            $table->integer('regione_id')->unsigned();
            $table->foreign('regione_id')->references('id')->on('regioni');
            $table->timestamps();
        });

        // Crea la tabella "comuni"
        Schema::create('comuni', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_comune');
            $table->string('codice_catastale');
            $table->integer('provincia_id')->unsigned();
            $table->foreign('provincia_id')->references('id')->on('province');
            $table->timestamps();
        });

        // Leggi il file CSV e importa i dati nelle tabelle
        $csvData = str_getcsv($csvFile, "\n");

        foreach ($csvData as $row) {
            $rowData = str_getcsv($row, ";");

            // Importa dati nella tabella "regioni"
            $regione = new App\Models\Regione();
            $regione->nome_regione = $rowData[10];
            $regione->save();

            // Importa dati nella tabella "province"
            $provincia = new App\Models\Provincia();
            $provincia->nome_provincia = $rowData[11];
            $provincia->sigla = $rowData[14];
            $provincia->regione_id = $regione->id;
            $provincia->save();

            // Importa dati nella tabella "comuni"
            $comune = new App\Models\Comune();
            $comune->nome_comune = $rowData[5];
            $comune->codice_catastale = $rowData[17];
            $comune->provincia_id = $provincia->id;
            $comune->save();
        }
    }

    public function down()
    {
        Schema::dropIfExists('comuni');
        Schema::dropIfExists('province');
        Schema::dropIfExists('regioni');
    }
}
