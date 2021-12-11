<?php
namespace DesignPatterns\Creational\AbstractFactory;
interface WriterFactory
{
	public function createCsvWriter();
	public function createJsonWriter();
}