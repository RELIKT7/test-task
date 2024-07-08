<?php

  namespace Database\Seeders;

  use Illuminate\Database\Console\Seeds\WithoutModelEvents;
  use Illuminate\Database\Seeder;
  use Illuminate\Support\Facades\DB;
  use Illuminate\Support\LazyCollection;

  class ApartmentSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
      DB::disableQueryLog();
      DB::table('apartments')->truncate();

      LazyCollection::make(function () {
        $handle = fopen(public_path('storage\files\property-data.csv'), 'r');

        while (($line = fgetcsv($handle, 4096)) !== false) {
          $dataString = implode(", ", $line);
          yield explode(',', $dataString);
        }

        fclose($handle);

      })
        ->skip(1)
        ->chunk(1000)
        ->each(function (LazyCollection $chunk) {

          $records = $chunk->map(function ($row) {
            return [
              "name" => $row[0],
              "price" => $row[1],
              "bedrooms" => $row[2],
              "bathrooms" => $row[3],
              "storeys" => $row[4],
              "garages" => $row[5],
              "created_at" => now(),
              "updated_at" => now()
            ];
          })->toArray();

          DB::table('apartments')->insert($records);

        });
    }
  }
