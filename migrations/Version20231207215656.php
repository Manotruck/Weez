<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231207215656 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE affichage_pub (id INT AUTO_INCREMENT NOT NULL, choix_utilisateur_id INT NOT NULL, UNIQUE INDEX UNIQ_B78483F2B2E58D79 (choix_utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE affichage_pub_pub (affichage_pub_id INT NOT NULL, pub_id INT NOT NULL, INDEX IDX_D2D925EA2A7AEE88 (affichage_pub_id), INDEX IDX_D2D925EA83FDE077 (pub_id), PRIMARY KEY(affichage_pub_id, pub_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE auteur_pub (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE choix_utilisateur_pub (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT NOT NULL, local TINYINT(1) NOT NULL, regional TINYINT(1) NOT NULL, national TINYINT(1) NOT NULL, international TINYINT(1) NOT NULL, INDEX IDX_18FB7803FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE choix_utilisateur_pub_genre_pub (choix_utilisateur_pub_id INT NOT NULL, genre_pub_id INT NOT NULL, INDEX IDX_A73A6E56A98EA31B (choix_utilisateur_pub_id), INDEX IDX_A73A6E56684ED057 (genre_pub_id), PRIMARY KEY(choix_utilisateur_pub_id, genre_pub_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre_pub (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_pub (id INT AUTO_INCREMENT NOT NULL, pub_id INT NOT NULL, auteur_id INT NOT NULL, relation VARCHAR(255) NOT NULL, date DATETIME DEFAULT NULL, code_postal VARCHAR(255) DEFAULT NULL, pays VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_303B1F683FDE077 (pub_id), INDEX IDX_303B1F660BB6FE6 (auteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_pub_genre_pub (post_pub_id INT NOT NULL, genre_pub_id INT NOT NULL, INDEX IDX_C6C5B53B3DF0412 (post_pub_id), INDEX IDX_C6C5B53684ED057 (genre_pub_id), PRIMARY KEY(post_pub_id, genre_pub_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pub (id INT AUTO_INCREMENT NOT NULL, auteur_pub_id_id INT NOT NULL, nom VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, INDEX IDX_5A443C85B06A74E1 (auteur_pub_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pub_genre_pub (pub_id INT NOT NULL, genre_pub_id INT NOT NULL, INDEX IDX_131DE54083FDE077 (pub_id), INDEX IDX_131DE540684ED057 (genre_pub_id), PRIMARY KEY(pub_id, genre_pub_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE affichage_pub ADD CONSTRAINT FK_B78483F2B2E58D79 FOREIGN KEY (choix_utilisateur_id) REFERENCES choix_utilisateur_pub (id)');
        $this->addSql('ALTER TABLE affichage_pub_pub ADD CONSTRAINT FK_D2D925EA2A7AEE88 FOREIGN KEY (affichage_pub_id) REFERENCES affichage_pub (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE affichage_pub_pub ADD CONSTRAINT FK_D2D925EA83FDE077 FOREIGN KEY (pub_id) REFERENCES pub (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE choix_utilisateur_pub ADD CONSTRAINT FK_18FB7803FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE choix_utilisateur_pub_genre_pub ADD CONSTRAINT FK_A73A6E56A98EA31B FOREIGN KEY (choix_utilisateur_pub_id) REFERENCES choix_utilisateur_pub (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE choix_utilisateur_pub_genre_pub ADD CONSTRAINT FK_A73A6E56684ED057 FOREIGN KEY (genre_pub_id) REFERENCES genre_pub (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_pub ADD CONSTRAINT FK_303B1F683FDE077 FOREIGN KEY (pub_id) REFERENCES pub (id)');
        $this->addSql('ALTER TABLE post_pub ADD CONSTRAINT FK_303B1F660BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur_pub (id)');
        $this->addSql('ALTER TABLE post_pub_genre_pub ADD CONSTRAINT FK_C6C5B53B3DF0412 FOREIGN KEY (post_pub_id) REFERENCES post_pub (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_pub_genre_pub ADD CONSTRAINT FK_C6C5B53684ED057 FOREIGN KEY (genre_pub_id) REFERENCES genre_pub (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pub ADD CONSTRAINT FK_5A443C85B06A74E1 FOREIGN KEY (auteur_pub_id_id) REFERENCES auteur_pub (id)');
        $this->addSql('ALTER TABLE pub_genre_pub ADD CONSTRAINT FK_131DE54083FDE077 FOREIGN KEY (pub_id) REFERENCES pub (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pub_genre_pub ADD CONSTRAINT FK_131DE540684ED057 FOREIGN KEY (genre_pub_id) REFERENCES genre_pub (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE affichage_pub DROP FOREIGN KEY FK_B78483F2B2E58D79');
        $this->addSql('ALTER TABLE affichage_pub_pub DROP FOREIGN KEY FK_D2D925EA2A7AEE88');
        $this->addSql('ALTER TABLE affichage_pub_pub DROP FOREIGN KEY FK_D2D925EA83FDE077');
        $this->addSql('ALTER TABLE choix_utilisateur_pub DROP FOREIGN KEY FK_18FB7803FB88E14F');
        $this->addSql('ALTER TABLE choix_utilisateur_pub_genre_pub DROP FOREIGN KEY FK_A73A6E56A98EA31B');
        $this->addSql('ALTER TABLE choix_utilisateur_pub_genre_pub DROP FOREIGN KEY FK_A73A6E56684ED057');
        $this->addSql('ALTER TABLE post_pub DROP FOREIGN KEY FK_303B1F683FDE077');
        $this->addSql('ALTER TABLE post_pub DROP FOREIGN KEY FK_303B1F660BB6FE6');
        $this->addSql('ALTER TABLE post_pub_genre_pub DROP FOREIGN KEY FK_C6C5B53B3DF0412');
        $this->addSql('ALTER TABLE post_pub_genre_pub DROP FOREIGN KEY FK_C6C5B53684ED057');
        $this->addSql('ALTER TABLE pub DROP FOREIGN KEY FK_5A443C85B06A74E1');
        $this->addSql('ALTER TABLE pub_genre_pub DROP FOREIGN KEY FK_131DE54083FDE077');
        $this->addSql('ALTER TABLE pub_genre_pub DROP FOREIGN KEY FK_131DE540684ED057');
        $this->addSql('DROP TABLE affichage_pub');
        $this->addSql('DROP TABLE affichage_pub_pub');
        $this->addSql('DROP TABLE auteur_pub');
        $this->addSql('DROP TABLE choix_utilisateur_pub');
        $this->addSql('DROP TABLE choix_utilisateur_pub_genre_pub');
        $this->addSql('DROP TABLE genre_pub');
        $this->addSql('DROP TABLE post_pub');
        $this->addSql('DROP TABLE post_pub_genre_pub');
        $this->addSql('DROP TABLE pub');
        $this->addSql('DROP TABLE pub_genre_pub');
    }
}
