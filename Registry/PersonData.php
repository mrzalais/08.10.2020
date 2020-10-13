<?php


class PersonData
{
    private string $name;
    private string $surname;
    private int $id;
    private string $address;

    public function __construct(string $name, string $surname, int $id, string $address)
    {

        $this->name = $name;
        $this->surname = $surname;
        $this->id = $id;
        $this->address = $address;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'surname' => $this->getSurname(),
            'person id' => $this->getId(),
            'address' => $this->getAddress(),
        ];
    }
}
