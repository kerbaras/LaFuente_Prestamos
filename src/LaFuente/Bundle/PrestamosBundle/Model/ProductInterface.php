<?php

namespace LaFuente\Bundle\PrestamosBundle\Model;

interface ProductInterface
{
    /**
     * @return string
     */
    public function __toString();

    /**
     * @return boolean
     */
    public function isAvailable();

    /**
     * @param boolean $availability
     *
     * @return self
     */
    public function setAvailability($availability);

    /**
     * @return array
     */
    public function getPrestamos();

    /**
     * @return  DateTime
     */
    public function getCreatedAt();
}