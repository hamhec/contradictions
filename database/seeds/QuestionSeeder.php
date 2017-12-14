<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Question 1
      DB::table('questions')->insert([
          'situation' => "L'objet <span class=\"red\">'o'</span> a la propriété <span class=\"red\">'S'</span>.<br/>
            L'objet <span class=\"red\">'o'</span> n'a pas la propriété <span class=\"red\">'S'</span>.<br/>
            L'objet <span class=\"red\">'o'</span> a la propriété <span class=\"red\">'T'</span>.<br/>

            <br/>

            Tout objet qui a la propriété <span class=\"red\">'S'</span> a aussi la propriété <span class=\"red\">'V'</span>.<br/>

            <br/>

            Un objet ne peut pas avoir les propriétés <span class=\"red\">'V'</span> et <span class=\"red\">'T'</span> en même temps.",

          'question' => "Peut-on dire que l'objet <span class=\"red\">'o'</span> a la propriété <span class=\"red\">'T'</span>?"
      ]);

      // Question 2
      DB::table('questions')->insert([
          'situation' => "Capteur 1 et Capteur 4 indiquent que <span class=\"red\">'o'</span> a la propriété <span class=\"red\">'U'</span>.<br/>
            Capteur 2 et Capteur 3 indiquent que <span class=\"red\">'o'</span> n'a pas la propriété <span class=\"red\">'U'</span>.<br/>

            <br/>

            Capteur 1 est plus fiable que Capteur 2.<br/>
            Capteur 4 est plus fiable que Capteur 3.<br/>",

          'question' => "Peut-on dire que l'objet <span class=\"red\">'o'</span> a la propriété <span class=\"red\">'U'</span>?"
      ]);

      // Question 3
      DB::table('questions')->insert([
          'situation' => "L'objet <span class=\"red\">'o'</span> a la propriété <span class=\"red\">'F'</span>.<br/>
            L'objet <span class=\"red\">'o'</span> a la propriété <span class=\"red\">'G'</span>.<br/>
            L'objet <span class=\"red\">'o'</span> a la propriété <span class=\"red\">'H'</span>.<br/>

            <br/>

            Tout objet qui a la propriété <span class=\"red\">'H'</span> a aussi la propriété <span class=\"red\">'Z'</span>.<br/>

            <br/>

            Un objet ne peut pas avoir les propriétés <span class=\"red\">'Z'</span> et <span class=\"red\">'G'</span> en même temps.",

          'question' => "Peut-on dire que l'objet <span class=\"red\">'o'</span> a la propriété <span class=\"red\">'F'</span>?"
      ]);

      // Question 4
      DB::table('questions')->insert([
          'situation' => "L'objet <span class=\"red\">'o'</span> a la propriété <span class=\"red\">'A'</span>.<br/>
            L'objet <span class=\"red\">'o'</span> a la propriété <span class=\"red\">'B'</span>.<br/>

            <br/>

            Tout objet qui a la propriété <span class=\"red\">'A'</span> a aussi la propriété <span class=\"red\">'C'</span>.<br/>
            Tout objet qui a la propriété <span class=\"red\">'B'</span> a aussi la propriété <span class=\"red\">'C'</span>.<br/>

            <br/>

            Un objet ne peut pas avoir les propriétés <span class=\"red\">'A'</span> et <span class=\"red\">'B'</span> en même temps.",

          'question' => "Peut-on dire que l'objet <span class=\"red\">'o'</span> a la propriété <span class=\"red\">'C'</span>?"
      ]);

      // Question 5
      DB::table('questions')->insert([
          'situation' => "L'objet <span class=\"red\">'o'</span> a la propriété <span class=\"red\">'P'</span>.<br/>
            L'objet <span class=\"red\">'o'</span> a la propriété <span class=\"red\">'I'</span>.<br/>

            <br/>

            Si un objet a la propriété <span class=\"red\">'P'</span> alors il existe un objet qui a la propriété <span class=\"red\">'S'</span>.<br/>
            Si un objet a la propriété <span class=\"red\">'I'</span> alors il existe un objet qui a la propriété <span class=\"red\">'S'</span>.

            <br/>

            Tout objet qui a la propriété <span class=\"red\">'S'</span> a aussi la propriété <span class=\"red\">'K'</span>.<br/>

            <br/>

            Un objet ne peut pas avoir les propriétés <span class=\"red\">'P'</span> et <span class=\"red\">'I'</span> en même temps.",

          'question' => "Peut-on dire qu'il existe un objet qui a la propriété <span class=\"red\">'K'</span>?"
      ]);

      // Question 6
      DB::table('questions')->insert([
          'situation' => "L'objet <span class=\"red\">'o'</span> a la propriété <span class=\"red\">'E'</span>.<br/>
            L'objet <span class=\"red\">'o'</span> a la propriété <span class=\"red\">'T'</span>.<br/>

            <br/>

            Tout objet qui a la propriété <span class=\"red\">'T'</span> a aussi la propriété <span class=\"red\">'C'</span>.<br/>

            <br/>

            Un objet ne peut pas avoir les propriétés <span class=\"red\">'E'</span> et <span class=\"red\">'T'</span> en même temps.",

          'question' => "Peut-on dire que l'objet <span class=\"red\">'o'</span> a la propriété <span class=\"red\">'C'</span>?"
      ]);

      // Question 7
      DB::table('questions')->insert([
          'situation' => "L'objet <span class=\"red\">'o'</span> a la propriété <span class=\"red\">'M'</span>.<br/>
            L'objet <span class=\"red\">'o'</span> a la propriété <span class=\"red\">'J'</span>.<br/>

            <br/>

            Tout objet qui a la propriété <span class=\"red\">'M'</span> a aussi la propriété <span class=\"red\">'S'</span>.<br/>
            Tout objet qui a la propriété <span class=\"red\">'J'</span> a aussi la propriété <span class=\"red\">'D'</span>.<br/>
            Tout objet qui a la propriété <span class=\"red\">'J'</span> a aussi la propriété <span class=\"red\">'L'</span>.<br/>
            <br/>

            Un objet ne peut pas avoir les propriétés <span class=\"red\">'S'</span> et <span class=\"red\">'D'</span> en même temps.",

          'question' => "Peut-on dire que l'objet <span class=\"red\">'o'</span> a la propriété <span class=\"red\">'L'</span>?"
      ]);

      // Question 8
      DB::table('questions')->insert([
          'situation' => "L'objet <span class=\"red\">'o'</span> a la propriété <span class=\"red\">'A'</span>.<br/>
            L'objet <span class=\"red\">'o'</span> a la propriété <span class=\"red\">'B'</span>.<br/>

            <br/>

            Tout objet qui a la propriété <span class=\"red\">'A'</span> a aussi la propriété <span class=\"red\">'C'</span>.<br/>
            Tout objet qui a la propriété <span class=\"red\">'B'</span> a aussi la propriété <span class=\"red\">'D'</span>.<br/>
            <br/>

            Un objet ne peut pas avoir les propriétés <span class=\"red\">'C'</span> et <span class=\"red\">'D'</span> en même temps.",

          'question' => "Peut-on dire que l'objet <span class=\"red\">'o'</span> a la propriété <span class=\"red\">'A'</span>?"
      ]);
    }
}
