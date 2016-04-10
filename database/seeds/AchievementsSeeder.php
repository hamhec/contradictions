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
      // Question 1 Tom l'ours
      DB::table('achievements')->insert([
          'title' => "Un ours qui embrasse des gens?!",
          'description' => "Répondre par 'Non' à la question 'Est-ce que Tom l’ours peut embrasser les gens?'",
          'icon' => "pets"
      ]);
      DB::table('achievements')->insert([
          'title' => "Embrasse moi Tom!",
          'description' => "Répondre par 'Oui' à la question 'Est-ce que Tom l’ours peut embrasser les gens?'",
          'icon' => "pets"
      ]);
      // Question 2 John
      DB::table('achievements')->insert([
          'title' => "John ne crie plus.",
          'description' => "Répondre par 'Non' à la question 'Est-ce que John crie sans raison?'",
          'icon' => "record_voice_over"
      ]);
      DB::table('achievements')->insert([
          'title' => "John arrête de crier!",
          'description' => "Répondre par 'Oui' à la question 'Est-ce que John crie sans raison?'",
          'icon' => "record_voice_over"
      ]);
      // Question 3 Vampires
      DB::table('achievements')->insert([
          'title' => "J'ai aimé Twilight!",
          'description' => "Répondre par 'Non' à la question 'Est-ce que le médicament SNG est pour les hybrides?'",
          'icon' => "polymer"
      ]);
      DB::table('achievements')->insert([
          'title' => "Blade prend de l'SNG!",
          'description' => "Répondre par 'Oui' à la question 'Est-ce que le médicament SNG est pour les hybrides?'",
          'icon' => "polymer"
      ]);


      // Question 4 Victor
      DB::table('achievements')->insert([
          'title' => "Le pavillon est en quarantaine!",
          'description' => "Répondre par 'Non' à la question 'Est-ce que Victor peut accéder pavillon de la quarantaine?'",
          'icon' => "pan_tool"
      ]);
      DB::table('achievements')->insert([
          'title' => "Victor passe par tout.",
          'description' => "Répondre par 'Oui' à la question 'Est-ce que Victor peut accéder pavillon de la quarantaine?'",
          'icon' => "pan_tool"
      ]);


      // Question 5 Jude
      DB::table('achievements')->insert([
          'title' => "Jude assis! Pas courir!",
          'description' => "Répondre par 'Non' à la question 'Est-ce que Jude porte des chaussures de course?'",
          'icon' => "directions_run"
      ]);
      DB::table('achievements')->insert([
          'title' => "J'aime ton Nike.",
          'description' => "Répondre par 'Oui' à la question 'Est-ce que Jude porte des chaussures de course?'",
          'icon' => "directions_run"
      ]);

      // Question 6 Anastasia
      DB::table('achievements')->insert([
          'title' => "Elle n'ira jamais au parc!",
          'description' => "Répondre par 'Non' à la question 'Est-ce que Anastasia est considéré comme un patient indépendant?'",
          'icon' => "accessible"
      ]);
      DB::table('achievements')->insert([
          'title' => "Anastasia va bien.",
          'description' => "Répondre par 'Oui' à la question 'Est-ce que Anastasia est considéré comme un patient indépendant?'",
          'icon' => "accessible"
      ]);


      // Question 7 Victor
      DB::table('achievements')->insert([
          'title' => "Il fait tout noir en salle 13!",
          'description' => "Répondre par 'Non' à la question 'Est-ce que la salle 13 est toujours illuminée?'",
          'icon' => "highlight"
      ]);
      DB::table('achievements')->insert([
          'title' => "Lumière!",
          'description' => "Répondre par 'Oui' à la question 'Est-ce que la salle 13 est toujours illuminée?'",
          'icon' => "highlight"
      ]);

      // Justification
      DB::table('achievements')->insert([
          'title' => "Je sais ce que je dis!",
          'description' => "justifier une réponse.",
          'icon' => "thumb_up"
      ]);
      DB::table('achievements')->insert([
          'title' => "Je ne sais pas ce que je dis.",
          'description' => "Ne pas justifier une réponse.",
          'icon' => "thumb_down"
      ]);
    }
}
