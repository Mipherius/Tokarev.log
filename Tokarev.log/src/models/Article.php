<?php
namespace src\models;


class Article extends ActiveRecordEntity{
    protected $AutorID;
    protected $Name;
    protected $Text;
    protected $Created_at;

    protected static function getTableName(): string{
        return 'articles';
    }
    public function getAuthorId(): int{
        return $this->AutorID;
    }
    public function getName(): string{
        return $this->Name;
    }
    public function getText(): string{
        return $this->Text;
    }
    public function getCreatedAt(){

        return $this->Created_at;
    }
    public function getAuthor(): User{
        return User:: getById($this->AutorID);
    }
    public function setName(string $name){
        $this->Name = $name;
    }
    public function setText(string $text){
        $this->Text = $text;
    }
    public function setAutorId(int $id){
        $this->AutorID = $id;
    }
    public function updateFromArray(array $fields){
        $this->setName($fields['name']);
        $this->setText($fields['text']);
        $this->save();
    }
}