<?php


class RegistryStorage
{
    private $resource;

    private array $persons;

    public function __construct()
    {
        $this->resource = fopen('names.csv', 'rwb+');

        $this->loadPersonData();
    }

    private function loadPersonData(): array
    {
        $persons = [];

        while (!feof($this->resource)) {

            $personData = array_filter((array)fgetcsv($this->resource));

            //var_dump($personData);

            if (!empty($personData)) {
                $this->persons[] = new PersonData(
                    (string)$personData[0],
                    (string)$personData[1],
                    (int)$personData[2],
                    (string)$personData[3],
                );
            }
        }
        return $persons;
    }

    public function getById(string $id): ?PersonData
    {
        foreach ($this->persons as $personData) {
            /** @var PersonData $personData */
            if ($personData->getId() === $id) {
                return $personData;
            }
        }
        return null;
    }

    public function saveToFile(array $data): void
    {
        if ($this->getById($data['person id']) !== null) {
            return;
        }
        fputcsv($this->resource, $data);
    }
}
