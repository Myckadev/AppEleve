<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220113205345 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activite (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, date_creation DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activite_eleve (activite_id INT NOT NULL, eleve_id INT NOT NULL, INDEX IDX_52DDC5FE9B0F88B1 (activite_id), INDEX IDX_52DDC5FEA6CC7B2 (eleve_id), PRIMARY KEY(activite_id, eleve_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competence (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competence_contenu (competence_id INT NOT NULL, contenu_id INT NOT NULL, INDEX IDX_9D8ABF1515761DAB (competence_id), INDEX IDX_9D8ABF153C1CC488 (contenu_id), PRIMARY KEY(competence_id, contenu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contenu (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contenu_activite (contenu_id INT NOT NULL, activite_id INT NOT NULL, INDEX IDX_500D4C43C1CC488 (contenu_id), INDEX IDX_500D4C49B0F88B1 (activite_id), PRIMARY KEY(contenu_id, activite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eleve (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activite_eleve ADD CONSTRAINT FK_52DDC5FE9B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activite_eleve ADD CONSTRAINT FK_52DDC5FEA6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleve (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competence_contenu ADD CONSTRAINT FK_9D8ABF1515761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competence_contenu ADD CONSTRAINT FK_9D8ABF153C1CC488 FOREIGN KEY (contenu_id) REFERENCES contenu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contenu_activite ADD CONSTRAINT FK_500D4C43C1CC488 FOREIGN KEY (contenu_id) REFERENCES contenu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contenu_activite ADD CONSTRAINT FK_500D4C49B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite_eleve DROP FOREIGN KEY FK_52DDC5FE9B0F88B1');
        $this->addSql('ALTER TABLE contenu_activite DROP FOREIGN KEY FK_500D4C49B0F88B1');
        $this->addSql('ALTER TABLE competence_contenu DROP FOREIGN KEY FK_9D8ABF1515761DAB');
        $this->addSql('ALTER TABLE competence_contenu DROP FOREIGN KEY FK_9D8ABF153C1CC488');
        $this->addSql('ALTER TABLE contenu_activite DROP FOREIGN KEY FK_500D4C43C1CC488');
        $this->addSql('ALTER TABLE activite_eleve DROP FOREIGN KEY FK_52DDC5FEA6CC7B2');
        $this->addSql('DROP TABLE activite');
        $this->addSql('DROP TABLE activite_eleve');
        $this->addSql('DROP TABLE competence');
        $this->addSql('DROP TABLE competence_contenu');
        $this->addSql('DROP TABLE contenu');
        $this->addSql('DROP TABLE contenu_activite');
        $this->addSql('DROP TABLE eleve');
    }
}
