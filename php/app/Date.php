<?php

namespace app;

final readonly class Date
{


    public function __construct(private int $day, private int $mounth, private int $year){

        if(!checkdate($this->mounth, $this->day, $this->year)){
            throw new \Exception("Не вірний формат дати: " . $this->$day);
        }
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @return string
     */
    public function getMonth(): string
    {
        return date("F", $this->getTimeStamp($this->toString()));
    }

    /**
     * @return string
     */
    public function getDay(): string
    {
        return date("l", $this->getTimeStamp($this->toString()));
    }

    /**
     * @param Date $date
     * @return string
     */
    public function isSameDate(Date $date): string
    {
        if($this->getTimeStamp() !== $date->getTimeStamp()){
            return "Різні дати!";
        }
        return "Дати однакові!";
    }

    /**
     * @param $date
     * @return false|int
     */
    private function getTimeStamp(): int
    {
        return strtotime($this->toString());
    }

    /**
     * @return string
     */
    private function toString(): string
    {
        return "{$this->day}-{$this->mounth}-{$this->year}";
    }

    /**
     * @param $format
     * @return string
     */
    public function formatting(string $format): string
    {
        return date($format, $this->getTimeStamp($this->toString()));
    }

    /**
     * @param Date $date
     * @return string
     */
    public function difference(Date $date): string
    {
        $diff = abs(($this->getTimeStamp() - $date->getTimeStamp())/24/60/60);
        return "Різниця становить $diff днів";

    }
}