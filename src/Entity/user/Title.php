<?php

namespace App\Entity\user;

class Title
{
	public const MRS_TITLE = 1;
	public const MR_TITLE = 2;
	public const MRS_MR_TITLE = 3;
	public const FAMILY_TITLE = 4;

	public static $titlesRecipient = [
		'civility.form.mrs.label' => self::MRS_TITLE,
		'civility.form.mr.label' => self::MR_TITLE,
		'civility.form.mr-mrs.label' => self::MRS_MR_TITLE,
		'civility.form.family.label' => self::FAMILY_TITLE,
	];

	public static $titlesFuneral = [
		'civility.form.mrs.label' => self::MRS_TITLE,
		'civility.form.mr.label' => self::MR_TITLE,
	];

	public static $titlesSender = [
		'civility.form.mrs.label' => self::MRS_TITLE,
		'civility.form.mr.label' => self::MR_TITLE,
		'civility.form.mr-mrs.label' => self::MRS_MR_TITLE,
		'civility.form.family.label' => self::FAMILY_TITLE,
	];

}