<?php

namespace rainwaves\PaygatePayment\Model;

class SubscriptionFrequency
{
    public const WEEKLY_ON_SUNDAY = 111;
    public const WEEKLY_ON_MONDAY = 112;
    public const WEEKLY_ON_TUESDAY = 113;
    public const WEEKLY_ON_WEDNESDAY = 114;
    public const WEEKLY_ON_THURSDAY = 115;
    public const WEEKLY_ON_FRIDAY = 116;
    public const WEEKLY_ON_SATURDAY = 117;
    public const SECOND_WEEKLY_ON_SUNDAY = 121;
    public const SECOND_WEEKLY_ON_MONDAY = 122;
    public const SECOND_WEEKLY_ON_TUESDAY = 123;
    public const SECOND_WEEKLY_ON_WEDNESDAY = 124;
    public const SECOND_WEEKLY_ON_THURSDAY = 125;
    public const SECOND_WEEKLY_ON_FRIDAY = 126;
    public const SECOND_WEEKLY_ON_SATURDAY = 127;
    public const THIRD_WEEKLY_ON_SUNDAY = 131;
    public const THIRD_WEEKLY_ON_MONDAY = 132;
    public const THIRD_WEEKLY_ON_TUESDAY = 133;
    public const THIRD_WEEKLY_ON_WEDNESDAY = 134;
    public const THIRD_WEEKLY_ON_THURSDAY = 135;
    public const THIRD_WEEKLY_ON_FRIDAY = 136;
    public const THIRD_WEEKLY_ON_SATURDAY = 137;

    public const MONTHLY_FIRST = 201;
    public const MONTHLY_SECOND = 202;
    public const MONTHLY_THIRD = 203;
    public const MONTHLY_FOURTH = 204;
    public const MONTHLY_FIFTH = 205;
    public const MONTHLY_SIXTH = 206;
    public const MONTHLY_SEVENTH = 207;
    public const MONTHLY_EIGHTH = 208;
    public const MONTHLY_NINTH = 209;
    public const MONTHLY_TENTH = 210;
    public const MONTHLY_ELEVENTH = 211;
    public const MONTHLY_TWELFTH = 212;
    public const MONTHLY_THIRTEENTH = 213;
    public const MONTHLY_FOURTEENTH = 214;
    public const MONTHLY_FIFTEENTH = 215;
    public const MONTHLY_SIXTEENTH = 216;
    public const MONTHLY_SEVENTEENTH = 217;
    public const MONTHLY_EIGHTEENTH = 218;
    public const MONTHLY_NINETEENTH = 219;
    public const MONTHLY_TWENTIETH = 220;
    public const MONTHLY_TWENTY_FIRST = 221;
    public const MONTHLY_TWENTY_SECOND = 222;
    public const MONTHLY_TWENTY_THIRD = 223;
    public const MONTHLY_TWENTY_FOURTH = 224;
    public const MONTHLY_TWENTY_FIFTH = 225;
    public const MONTHLY_TWENTY_SIXTH = 226;
    public const MONTHLY_TWENTY_SEVENTH = 227;
    public const MONTHLY_TWENTY_EIGHTH = 228;
    public const MONTHLY_LAST_DAY = 229;

    public static array $subscriptionFrequencyText = [
      self::WEEKLY_ON_SUNDAY => 'Weekly on Sunday',
      self::WEEKLY_ON_MONDAY => 'Weekly on Monday',
      self::WEEKLY_ON_TUESDAY => 'Weekly on Tuesday',
      self::WEEKLY_ON_WEDNESDAY => 'Weekly on Wednesday',
      self::WEEKLY_ON_THURSDAY => 'Weekly on Thursday',
      self::WEEKLY_ON_FRIDAY => 'Weekly on Friday',
      self::WEEKLY_ON_SATURDAY => 'Weekly on Saturday',
      self::SECOND_WEEKLY_ON_SUNDAY => '2nd Weekly on Sunday',
      self::SECOND_WEEKLY_ON_MONDAY => '2nd Weekly on Monday',
      self::SECOND_WEEKLY_ON_TUESDAY => '2nd Weekly on Tuesday',
      self::SECOND_WEEKLY_ON_WEDNESDAY => '2nd Weekly on Wednesday',
      self::SECOND_WEEKLY_ON_THURSDAY => '2nd Weekly on Thursday',
      self::SECOND_WEEKLY_ON_FRIDAY => '2nd Weekly on Friday',
      self::SECOND_WEEKLY_ON_SATURDAY => '2nd Weekly on Saturday',
      self::THIRD_WEEKLY_ON_SUNDAY => '3rd Weekly on Sunday',
      self::THIRD_WEEKLY_ON_MONDAY => '3rd Weekly on Monday',
      self::THIRD_WEEKLY_ON_TUESDAY => '3rd Weekly on Tuesday',
      self::THIRD_WEEKLY_ON_WEDNESDAY => '3rd Weekly on Wednesday',
      self::THIRD_WEEKLY_ON_THURSDAY => '3rd Weekly on Thursday',
      self::THIRD_WEEKLY_ON_FRIDAY => '3rd Weekly on Friday',
      self::THIRD_WEEKLY_ON_SATURDAY => '3rd Weekly on Saturday',
      self::MONTHLY_FIRST => 'Monthly on 1st',
      self::MONTHLY_SECOND => 'Monthly on 2nd',
      self::MONTHLY_THIRD => 'Monthly on 3rd',
      self::MONTHLY_FOURTH => 'Monthly on 4th',
      self::MONTHLY_FIFTH => 'Monthly on 5th',
      self::MONTHLY_SIXTH => 'Monthly on 6th',
      self::MONTHLY_SEVENTH => 'Monthly on 7th',
      self::MONTHLY_EIGHTH => 'Monthly on 8th',
      self::MONTHLY_NINTH => 'Monthly on 9th',
      self::MONTHLY_TENTH => 'Monthly on 10th',
      self::MONTHLY_ELEVENTH => 'Monthly on 11th',
      self::MONTHLY_TWELFTH => 'Monthly on 12th',
      self::MONTHLY_THIRTEENTH => 'Monthly on 13th',
      self::MONTHLY_FOURTEENTH => 'Monthly on 14th',
      self::MONTHLY_FIFTEENTH => 'Monthly on 15th',
      self::MONTHLY_SIXTEENTH => 'Monthly on 16th',
      self::MONTHLY_SEVENTEENTH => 'Monthly on 17th',
      self::MONTHLY_EIGHTEENTH => 'Monthly on 18th',
      self::MONTHLY_NINETEENTH => 'Monthly on 19th',
      self::MONTHLY_TWENTIETH => 'Monthly on 20th',
      self::MONTHLY_TWENTY_FIRST => 'Monthly on 21st',
      self::MONTHLY_TWENTY_SECOND => 'Monthly on 22nd',
      self::MONTHLY_TWENTY_THIRD => 'Monthly on 23rd',
      self::MONTHLY_TWENTY_FOURTH => 'Monthly on 24th',
      self::MONTHLY_TWENTY_FIFTH => 'Monthly on 25th',
      self::MONTHLY_TWENTY_SIXTH => 'Monthly on 26th',
      self::MONTHLY_TWENTY_SEVENTH => 'Monthly on 27th',
      self::MONTHLY_TWENTY_EIGHTH => 'Monthly on 28th',
      self::MONTHLY_LAST_DAY => 'Last day of the month',
    ];

    public static function getSubscriptionFrequencyText(int $frequency): string
    {
        return self::$subscriptionFrequencyText[$frequency];
    }
}