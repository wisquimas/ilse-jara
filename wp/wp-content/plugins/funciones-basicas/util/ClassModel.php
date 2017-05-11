<?php

class MemberModel {
	public $name = "";
	public $docs = "";
}

/**
 * Interface IAccessible
 * A member that has different access levels.
 */
interface IAccessible {
	public function SetAccessLevel($accessLevel);
	public function GetAccessLevel();
}

/**
 * Interface IGenerable
 * A member that can generate its own code.
 */
interface IGenerable {
	public function Generate();
}

/**
 * Interface IDocumentable
 * A member that can has it's own documentation.
 */
interface IDocumentable {
	public function SetDocs($docs);
	public function GetDocs();
}

/**
 * The available access levels.
 * Class AccessLevel
 */
class AccessLevel {
	const AccessPrivate 	= "private";
	const AccessPublic 		= "public";
	const AccessProtected 	= "protected";
}

/**
 * Class MemberKeywords
 * Different keywords used by php to generate members.
 */
class MemberKeywords {
	const MemberStatic		= "static";
	const MemberFunction	= "function";
	const MemberConst		= "const";
	const MemberClass		= "class";
	const MemberVar			= "var";
}

/**
 * Class CodeSettings
 * Several settings to generate the code.
 */
class CodeSettings {
	const NewLine 			= "\n";
}

/**
 * Class FunctionModel
 * Represents a php function.
 */
class FunctionModel extends MemberModel implements IAccessible, IGenerable, IDocumentable {

	public $accessLevel 	= AccessLevel::AccessPrivate;
	public $isStatic 		= false;
	public $staticKeyword	= "";

	public function __construct($name, $accessLevel, $isStatic, $body)
	{
		$this->name = $name;
		$this->body = $body;
		$this->staticKeyword = $isStatic ? MemberKeywords::MemberStatic : "";
		$this->SetAccessLevel($accessLevel);
	}

	public function SetAccessLevel($accessLevel)
	{
		$this->accessLevel = $accessLevel;
	}

	public function GetAccessLevel()
	{
		return $this->accessLevel;
	}

	public function Generate()
	{
		$newLine = CodeSettings::NewLine;
		$keyword = MemberKeywords::MemberFunction;
		return "{$this->GetDocs()}$newLine$this->accessLevel $this->staticKeyword $keyword $this->name(){{$this->body}}";
	}

	public function SetDocs($docs)
	{
		$this->docs = $docs;
	}

	public function GetDocs()
	{
		return $this->docs;
	}

	public static function Demo1() {
		$body = "return 3 + 3;";
		$docs = "/** This is a function generated by facundo! */";
		$f = new FunctionModel("MyDemoFunction", AccessLevel::AccessPrivate, true, $body);
		$f->SetDocs($docs);
		return $f;
	}
	public static function Demo2() {
		$body = "return 'you are a facundo!';";
		return new FunctionModel("GetTheName", AccessLevel::AccessPublic, false, $body);
	}
	public static function Demo3() {
		$body = "throw new Exception('lol, you failed!');";
		return new FunctionModel("GetAnError", AccessLevel::AccessPrivate, true, $body);
	}
}

class ClassModel implements IGenerable {

	private 	$myPrivateVar		= "jojo";
	protected 	$myProctectedVar	= "jojo";
	public 		$myPublicVar		= "jojo";

	public static $myPublicStaticVar = "jojo";
	const MyConst 				= "jojo";

	public static function MyPublicStaticFunction() {

	}

	protected static function MyProtectedStaticFunction() {

	}

	protected static function MyPrivateStaticFunction() {

	}

	public function MyPublicFunction() {

	}

	/**
	 * @return string
	 */
	public function Generate(){
		return "";
	}
}