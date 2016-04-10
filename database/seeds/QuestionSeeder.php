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
          'world' => "Tom l'ours est dans le club.<br/>
            Tom l'ours est mince.<br/>
            Si Tom l'ours est mince alors il peut manger des McBeers.<br/>
            Si Tom l'ours mange des McBeers alors il doit porter des gants.<br/>
            Si Tom l'ours est dans le club alors il doit porter une bague.<br/>
            Si Tom l'ours porte des gants alors il peut serrer la main aux gens.<br/>
            Si Tom l'ours porte une bague alors il peut serrer la main aux gens.<br/>
            Si Tom peut serrer la main aux gens alors il peut les embrasser.<br/>
            Il est impossible de porter une bague et des gants en même temps.",
          'question1' => "Est-ce que Tom l’ours peut serrer la main aux gens du club?",
          'right_answer1' => 1,
          'exp_classic' => "Oui, car Tom l’ours est dans le club et il est mince.",

          'exp_dialog' => "<span class='pro'>Alice:</span> Est-ce que Tom l’ours peut serrer la main aux gens du club?<br/>
              <span class='opp'>Bob:</span> Oui.<br/>
              <span class='pro'>Alice:</span> Pourquoi?<br/>
              <span class='opp'>Bob:</span> Parce qu'il est dans le club.<br/>
              <span class='pro'>Alice:</span> Elaborez?<br/>
              <span class='opp'>Bob:</span> Vu qu’il est dans le club, il doit porter une bague. Par conséquent, il peut leur serrer la main.<br/>
              <span class='pro'>Alice:</span> Mais il doit porter des gants, pas une bague.<br/>
              <span class='opp'>Bob:</span> Je ne vois pas comment cela peut être un problème?<br/>
              <span class='pro'>Alice:</span> On ne peut pas porter une bague et des gants en même temps.<br/>
              <span class='opp'>Bob:</span> Oui, mais cela ne change pas le fait qu'il peut leur serrer la main aux gens.<br/>
              <span class='pro'>Alice:</span> Pourquoi?<br/>
              <span class='opp'>Bob:</span> Parce que s’il porte une bague alors il peut leur serrer la main aussi.<br/>
              <span class='pro'>Alice:</span> Ok, je suis d'accord.",

          'question2' => "Est-ce que Tom l’ours peut embrasser les gens?",
          'right_answer2' => 1
      ]);

      // Question 2
      DB::table('questions')->insert([
          'world' => "John est un patient dans le service psychiatrique.<br/>
              John est un garçon d’un an.<br/>
              Tous les patients de l'hôpital psychiatrique sont considérés comme des fous.<br/>
              Tous les patients fous ont besoin de  supervision.<br/>
              Tous les garçons d’un an sont considérés comme des bébés.<br/>
              Les bébés ne sont pas considérés comme des fous.<br/>
              Les patients fous crient sans raison.<br/>
              Les bébés crient sans raison.",
          'question1' => "Est-ce que John a besoin de supervision?",
          'right_answer1' => 1,
          'exp_classic' => "Oui, car il est un patient dans le service psychiatrique et il est un garçon d’un an.",
          'exp_dialog' => "<span class='pro'>Alice:</span> Est-ce que John a besoin de supervision?<br/>
<span class='opp'>Bob:</span> Oui.<br/>
<span class='pro'>Alice:</span> Pourquoi?<br/>
<span class='opp'>Bob:</span> Parce qu'il est fous.<br/>
<span class='pro'>Alice:</span> Pourquoi?<br/>
<span class='opp'>Bob:</span> Car il est un patient dans le service psychiatrique.<br/>
<span class='pro'>Alice:</span> Mais John n’est pas fous parce il est un bébé, et les bébés ne sont pas considérés comme des fous.<br/>
<span class='opp'>Bob:</span> En tous cas, John a besoin de supervision car il est un bébé.<br/>
<span class='pro'>Alice:</span> Oui je suis d’accord.",
          'question2' => "Est-ce que John crie sans raison?",
          'right_answer2' => 1
      ]);

      // Question 3
      DB::table('questions')->insert([
          'world' => "Le médicament SNG est prescrit pour les vampires<br/>
              Le médicament SNG est prescrit pour les loupgarous.<br/>
              Tous les médicaments pour les vampires sont rouges<br/>
              Tous les médicaments pour les loupgarous sont rouges<br/>
              Tout médicament pour les vampires est un medicament pour les hybrides.<br/>
              Tout médicament pour les loupgarous est un medicament pour les hybrides.<br/>
              Il est impossible qu’un médicament soit pour les vampires et les lougaroups en même temps.",
          'question1' => "Est-ce que le médicament SNG est rouge?",
          'right_answer1' => 1,
          'exp_classic' => "Oui, car le médicament SNG est prescrit pour les vampires et il est prescrit pour les loupgarous.",
          'exp_dialog' => "<span class='pro'>Alice:</span> Est-ce que le médicament SNG est rouge?<br/>
<span class='opp'>Bob:</span> Oui.<br/>
<span class='pro'>Alice:</span> Pourquoi?<br/>
<span class='opp'>Bob:</span> Parce qu’il est un médicament pour les vampires<br/>
<span class='pro'>Alice:</span> Mais SNG est un médicament pour les loupgarous.<br/>
<span class='opp'>Bob:</span> Tout de même, SNG reste un médicament rouge.<br/>
<span class='pro'>Alice:</span> Oui je  suis d’accord. Je comprends.",
          'question2' => "Est-ce que le médicament SNG est pour les hybrides.",
          'right_answer2' => 1
      ]);

      // Question 4
      DB::table('questions')->insert([
          'world' => "Victor a un badge Delta.<br/>
Victor est myope.<br/>
Toute personne ayant un badge Delta accèdent au pavillon de la quarantaine.<br/>
Les personnes qui ont accés au pavillon de la quarantaine doivent porter toujours des lunettes de protection.<br/>
Si une personne est myope, alors elle doit porter toujours des lunettes de correction.<br/>
Les lunettes de protection sont des lunettes.<br/>
Les lunettes de correction sont des lunettes.<br/>
Une personne ne peut pas porter des lunettes de protection et des lunettes de correction en même temps.<br/>
Il n'y a qu'un seul Victor dans l'hopital",
          'question1' => "Est-ce que Victor peut porter des lunettes de protection?",
          'right_answer1' => 0,
          'exp_classic' => "Non, car Victor est myope.",
          'exp_dialog' => "<span class='pro'>Alice:</span> Est-ce que Victor peut porter des lunettes de protection?<br/>
<span class='opp'>Bob:</span> Non.<br/>
<span class='pro'>Alice:</span> Pourquoi?<br/>
<span class='opp'>Bob:</span> Parce qu'il est myope.<br/>
<span class='pro'>Alice:</span> Je ne vois pas comment cela peut être un problème?<br/>
<span class='opp'>Bob:</span> Si Victor est myope alors il doit porter toujours des lunettes de correction. Par conséquent il ne va pas pouvoir porter des lunettes de protection.<br/>
<span class='pro'>Alice:</span> Pourquoi?<br/>
<span class='opp'>Bob:</span> Parceque une personne ne peut pas porter des lunettes de protection et des lunettes de correction en même temps.<br/>
 <span class='pro'>Alice:</span> Oui je  suis d’accord. Je comprends.",
          'question2' => "Est-ce que Victor peut accéder pavillon de la quarantaine?",
          'right_answer2' => 0
      ]);


      // Question 5
      DB::table('questions')->insert([
          'world' => "Jude est un serpent<br/>
Jude est un puma<br/>
Tous les serpents portent des lunettes de soleil.<br/>
Tous les pumas porte des chaussures de course.<br/>
On ne peut pas être un serpent et un puma en même temps.<br/>
Il y a seulement une seule Jude dans la forêt.",
          'question1' => "Est-ce que Jude porte des lunettes de soleil?",
          'right_answer1' => 0,
          'exp_classic' => "Non, car Jude est un puma.",
          'exp_dialog' => "<span class='pro'>Alice:</span> Est-ce que Jude porte des lunettes de soleil?<br/>
<span class='opp'>Bob:</span> Non.<br/>
<span class='pro'>Alice:</span> Pourquoi.<br/>
<span class='opp'>Bob:</span> Parce qu'elle est un puma.<br/>
<span class='pro'>Alice:</span> Et c’est quoi le souci?<br/>
<span class='opp'>Bob:</span> Vu que Jude ne peut pas être un puma et un serpent en même temps, alors on ne peut pas conclure qu’elle porte des lunettes de soleil.<br/>
 <span class='pro'>Alice:</span> Oui je  suis d’accord. Je comprends.",
          'question2' => "Est-ce que Jude porte des chaussures de course?",
          'right_answer2' => 0
      ]);


      // Question 6
      DB::table('questions')->insert([
          'world' => "Anastasia a la maladie de Parkinson.<br/>
Anastasia a un badge blanc.<br/>
Tous les patients atteints de la maladie de Parkinson ont besoin de supervision.<br/>
Tous les patients avec un badge blanc peuvent aller au parc.<br/>
Tous les patients qui peuvent aller au parc sont considérés comme des patients indépendants.<br/>
Tous les patients qui ont besoin de supervision ont mauvaise écriture.<br/>
Il est impossible qu’un patient soit indépendant et ait besoin d’une assistance spéciale en même temps.",
          'question1' => "Est-ce que Anastasia a une mauvaise écriture?",
          'right_answer1' => 0,
          'exp_classic' => "Non, car Anastasia a un badge blanc.",
          'exp_dialog' => "<span class='pro'>Alice:</span> Est-ce que Anastasia a une mauvaise écriture?<br/>
<span class='opp'>Bob:</span> Non.<br/>
<span class='pro'>Alice:</span> Pourquoi?<br/>
<span class='opp'>Bob:</span> Parce qu'elle a un badge blanc.<br/>
<span class='pro'>Alice:</span> Elaborez?<br/>
<span class='opp'>Bob:</span> Le fait qu’elle a un badge blanc lui permet d’aller au parc, donc elle est independante.<br/>
<span class='pro'>Alice:</span> Comment cela pose un problème?<br/>
<span class='opp'>Bob:</span> Anastasia ne peut pas etre independante et avoir besoin de supervision qui justifirait une mauvaise écriture.<br/>
<span class='pro'>Alice:</span> Je comprends.",
          'question2' => "Est-ce que Anastasia est considéré comme un patient indépendant?",
          'right_answer2' => 0
      ]);

      // Question 7
      DB::table('questions')->insert([
          'world' => "La salle 13 est une salle d'opération.<br/>
La salle 13 dispose d'une machine de soda.<br/>
Toutes les salles d'opération sont des salles spéciales.<br/>
Toutes les salles avec une machine de soda sont des salles d'attente.<br/>
Toutes les salles spéciales ont une alimentation éléctrique de secours.<br/>
Toutes les salle qui ont une alimentation éléctrique de secours sont toujours illuminées.<br/>
Les salles d'attente ne peuvent pas avoir des alimentations éléctrique d'urgence.",
          'question1' => "Est-ce que la salle 13 a une alimentation éléctrique de secours?",
          'right_answer1' => 0,
          'exp_classic' => "Non, car la salle 13 dispose d’une machine de soda.",
          'exp_dialog' => "<span class='pro'>Alice:</span> Est-ce que la salle 13 a une alimentation éléctrique de secours?<br/>
<span class='opp'>Bob:</span> Non.<br/>
<span class='pro'>Alice:</span> Pourquoi.<br/>
<span class='opp'>Bob:</span> Parce qu'elle dispose d’une machine de soda, du coup, elle est une salle d’attente.<br/>
<span class='pro'>Alice:</span> Je ne vois pas le problème.<br/>
<span class='opp'>Bob:</span> La salle 13 ne peut pas être une salle d’attente et avoir une alimentation éléctrique de secours en meme temps.<br/>
<span class='pro'>Alice:</span> Je comprends.",
          'question2' => "Est-ce que la salle 13 est toujours illuminée?",
          'right_answer2' => 0
      ]);
    }
}
