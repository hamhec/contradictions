<?php

use Illuminate\Database\Seeder;

class AchievementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Justification
      DB::table('achievements')->insert([
          'title' => "Je ne sais pas ce que je dis.",
          'description' => "Ne pas justifier une réponse.",
          'icon' => "thumb_down"
      ]);
      DB::table('achievements')->insert([
          'title' => "Je sais ce que je dis!",
          'description' => "justifier une réponse.",
          'icon' => "thumb_up"
      ]);

      // Questions
      DB::table('achievements')->insert([
          'title' => "First Blood!",
          'description' => "Répondre à une question.",
          'icon' => "touch_app"
      ]);

      // Oui
      DB::table('achievements')->insert([
          'title' => "Affirmatif chef!",
          'description' => "Répondre par 'Oui' à 1 question.",
          'icon' => "done"
      ]);
      DB::table('achievements')->insert([
          'title' => "Je confirme!",
          'description' => "Répondre par 'Oui' à 3 questions.",
          'icon' => "done_all"
      ]);
      DB::table('achievements')->insert([
          'title' => "On peut tout dire!",
          'description' => "Répondre par 'Oui' à 5 questions.",
          'icon' => "check_circle"
      ]);

      // Non
      DB::table('achievements')->insert([
          'title' => "Négatif chef!",
          'description' => "Répondre par 'Non' à 1 question.",
          'icon' => "clear"
      ]);
      DB::table('achievements')->insert([
          'title' => "Non c'est non!",
          'description' => "Répondre par 'Non' à 3 questions.",
          'icon' => "block"
      ]);
      DB::table('achievements')->insert([
          'title' => "Je suis un pessimiste par nature!",
          'description' => "Répondre par 'Non' à 5 questions.",
          'icon' => "backspace"
      ]);

      // Je ne sais pas
      DB::table('achievements')->insert([
          'title' => "Je suis prudent!",
          'description' => "Répondre par 'Je ne sais pas' à 1 question.",
          'icon' => "remove"
      ]);
      DB::table('achievements')->insert([
          'title' => "Je suis indécis!",
          'description' => "Répondre par 'Je ne sais pas' à 3 questions.",
          'icon' => "remove_circle_outline"
      ]);
      DB::table('achievements')->insert([
          'title' => "Je ne sais rien!",
          'description' => "Répondre par 'Je ne sais pas' à 5 questions.",
          'icon' => "remove_circle"
      ]);

    }
}
