<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210422161219 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cours ADD favoris TINYINT(1) DEFAULT NULL, CHANGE titre titre VARCHAR(1024) DEFAULT NULL, CHANGE fichier fichier VARCHAR(1024) DEFAULT NULL, CHANGE formation_id formation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE examen_question ADD CONSTRAINT FK_8A572DF85C8659A FOREIGN KEY (examen_id) REFERENCES examen (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE examen_question ADD CONSTRAINT FK_8A572DF81E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE examenquestion ADD CONSTRAINT FK_613FCF17325D2776 FOREIGN KEY (idExamen) REFERENCES examen (id)');
        $this->addSql('ALTER TABLE examenquestion ADD CONSTRAINT FK_613FCF17E5546315 FOREIGN KEY (idQuestion) REFERENCES question (id)');
        $this->addSql('ALTER TABLE listereponse ADD CONSTRAINT FK_97F44C7F4F0FB535 FOREIGN KEY (idReponse) REFERENCES reponse (id)');
        $this->addSql('ALTER TABLE listereponse ADD CONSTRAINT FK_97F44C7FE5546315 FOREIGN KEY (idQuestion) REFERENCES question (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14325D2776 FOREIGN KEY (idExamen) REFERENCES examen (id)');
        $this->addSql('ALTER TABLE reponse CHANGE idQuestion idQuestion INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC7E5546315 FOREIGN KEY (idQuestion) REFERENCES question (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE cours DROP favoris, CHANGE titre titre VARCHAR(1024) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE fichier fichier VARCHAR(1024) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE formation_id formation_id INT NOT NULL');
        $this->addSql('ALTER TABLE examen_question DROP FOREIGN KEY FK_8A572DF85C8659A');
        $this->addSql('ALTER TABLE examen_question DROP FOREIGN KEY FK_8A572DF81E27F6BF');
        $this->addSql('ALTER TABLE examenquestion DROP FOREIGN KEY FK_613FCF17325D2776');
        $this->addSql('ALTER TABLE examenquestion DROP FOREIGN KEY FK_613FCF17E5546315');
        $this->addSql('ALTER TABLE listereponse DROP FOREIGN KEY FK_97F44C7F4F0FB535');
        $this->addSql('ALTER TABLE listereponse DROP FOREIGN KEY FK_97F44C7FE5546315');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14325D2776');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC7E5546315');
        $this->addSql('ALTER TABLE reponse CHANGE idQuestion idQuestion INT NOT NULL');
    }
}
