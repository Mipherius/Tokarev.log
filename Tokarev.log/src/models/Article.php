<?php
namespace src\models;
use InvalidArgumentException;
use src\services\Db;

class  Article extends ActiveRecordEntity{
    protected $AutorID;
    protected $Name;
    protected $Text;
    protected $Created_at;
    protected $Img;

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
    public function getCreatedAt(): string{
        return $this->Created_at;
    }
    public function getImg(){
        return $this->Img;
    }
    public function getAuthor(): User{
        return User::getById($this->AutorID);
    }
    public function setName($name){
        $this->Name = $name;
    }
    public function setText($text){
        $this->Text = $text;
    }
    public function setAuthorId($authorId){
        $this->AutorID = $authorId;
    }
    public function updateFromArray(array $fields, array $imgFile=[]): Article{
        if(empty($fields['name'])){
            throw new InvalidArgumentException("Не передано название статьи");
        }
        if(empty($fields['text'])){
            throw new InvalidArgumentException("Не передан текст статьи");
        }
        if($imgFile['size'] > 10*1024*1024*1024){
            throw new InvalidArgumentException("Слишком большой файл.");
        }
        $this->Name = $fields['name'];
        $this->Text = $fields['text'];
        if(!empty($imgFile['name'])){
            $filePath = 'uploads/' . $imgFile['name'];
            $this->Img = $filePath;
            if(!move_uploaded_file($imgFile["tmp_name"], $filePath)){
                throw new InvalidArgumentException(('Ошибка при загрузке файла'));
            }
        }
        $this->save();
        return $this;
    }
    public static function create(array $fields, User $author, array $imgFile=[]): Article{
        if(empty($fields['name'])){
            throw new InvalidArgumentException("Не передано название статьи");
        }
        if(empty($fields['text'])){
            throw new InvalidArgumentException("Не передан текст статьи");
        }
        if($imgFile['size'] > 10*1024*1024*1024){
            throw new InvalidArgumentException("Слишком большой файл.");
        }
        $article = new Article;
        $article->Name = $fields['name'];
        $article->Text = $fields['text'];
        $article->AutorID = $author->getId();
        if(!empty($imgFile['name'])){
            $filePath = 'uploads/' . $imgFile['name'];
            $article->Img = $filePath;
            if(!move_uploaded_file($imgFile["tmp_name"], $filePath)){
                throw new InvalidArgumentException(('Ошибка при загрузке файла'));
            }
        }
        $article->save();
        return $article;
    }
    public static function searchByName($searchString): ?array{
        return parent::search('Name', $searchString);
    }
}