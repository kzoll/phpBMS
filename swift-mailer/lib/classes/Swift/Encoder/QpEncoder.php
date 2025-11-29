<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


/**
 * Handles Quoted Printable (QP) Encoding in Swift Mailer.
 * Possibly the most accurate RFC
##### v2045
QP implementation found in PHP.
 * @package Swift
 * @subpackage Encoder
 * @author Chris Corbyn
 */
class Swift_Encoder_QpEncoder implements Swift_Encoder
{

  /**
   * The CharacterStream used for reading characters (as opposed to bytes).
   * @var Swift_CharacterStream
   * @access protected
   */
  protected $_charStream;

  /**
   * A filter used if input should be canonicalized.
   * @var Swift_StreamFilter
   * @access protected
   */
  protected $_filter;

  /**
   * Pre-computed QP for HUGE optmization.
   * @var string[]
   * @access protected
   */
  protected $_qpMap = array(
   
##### v0
  => '=00',
##### v1
  => '=01',
##### v2
  => '=02',
##### v3
  => '=03',
##### v4
  => '=04',
   
##### v5
  => '=05',
##### v6
  => '=06',
##### v7
  => '=07',
##### v8
  => '=08',
##### v9
  => '=09',
   
##### v10
 => '=0A',
##### v11
 => '=0B',
##### v12
 => '=0C',
##### v13
 => '=0D',
##### v14
 => '=0E',
   
##### v15
 => '=0F',
##### v16
 => '=10',
##### v17
 => '=11',
##### v18
 => '=12',
##### v19
 => '=13',
   
##### v20
 => '=14',
##### v21
 => '=15',
##### v22
 => '=16',
##### v23
 => '=17',
##### v24
 => '=18',
   
##### v25
 => '=19',
##### v26
 => '=1A',
##### v27
 => '=1B',
##### v28
 => '=1C',
##### v29
 => '=1D',
   
##### v30
 => '=1E',
##### v31
 => '=1F',
##### v32
 => '=20',
##### v33
 => '=21',
##### v34
 => '=22',
   
##### v35
 => '=23',
##### v36
 => '=24',
##### v37
 => '=25',
##### v38
 => '=26',
##### v39
 => '=27',
   
##### v40
 => '=28',
##### v41
 => '=29',
##### v42
 => '=2A',
##### v43
 => '=2B',
##### v44
 => '=2C',
   
##### v45
 => '=2D',
##### v46
 => '=2E',
##### v47
 => '=2F',
##### v48
 => '=30',
##### v49
 => '=31',
   
##### v50
 => '=32',
##### v51
 => '=33',
##### v52
 => '=34',
##### v53
 => '=35',
##### v54
 => '=36',
   
##### v55
 => '=37',
##### v56
 => '=38',
##### v57
 => '=39',
##### v58
 => '=3A',
##### v59
 => '=3B',
   
##### v60
 => '=3C',
##### v61
 => '=3D',
##### v62
 => '=3E',
##### v63
 => '=3F',
##### v64
 => '=40',
   
##### v65
 => '=41',
##### v66
 => '=42',
##### v67
 => '=43',
##### v68
 => '=44',
##### v69
 => '=45',
   
##### v70
 => '=46',
##### v71
 => '=47',
##### v72
 => '=48',
##### v73
 => '=49',
##### v74
 => '=4A',
   
##### v75
 => '=4B',
##### v76
 => '=4C',
##### v77
 => '=4D',
##### v78
 => '=4E',
##### v79
 => '=4F',
   
##### v80
 => '=50',
##### v81
 => '=51',
##### v82
 => '=52',
##### v83
 => '=53',
##### v84
 => '=54',
   
##### v85
 => '=55',
##### v86
 => '=56',
##### v87
 => '=57',
##### v88
 => '=58',
##### v89
 => '=59',
   
##### v90
 => '=5A',
##### v91
 => '=5B',
##### v92
 => '=5C',
##### v93
 => '=5D',
##### v94
 => '=5E',
   
##### v95
 => '=5F',
##### v96
 => '=60',
##### v97
 => '=61',
##### v98
 => '=62',
##### v99
 => '=63',
   
##### v100
=> '=64',
##### v101
=> '=65',
##### v102
=> '=66',
##### v103
=> '=67',
##### v104
=> '=68',
   
##### v105
=> '=69',
##### v106
=> '=6A',
##### v107
=> '=6B',
##### v108
=> '=6C',
##### v109
=> '=6D',
   
##### v110
=> '=6E',
##### v111
=> '=6F',
##### v112
=> '=70',
##### v113
=> '=71',
##### v114
=> '=72',
   
##### v115
=> '=73',
##### v116
=> '=74',
##### v117
=> '=75',
##### v118
=> '=76',
##### v119
=> '=77',
   
##### v120
=> '=78',
##### v121
=> '=79',
##### v122
=> '=7A',
##### v123
=> '=7B',
##### v124
=> '=7C',
   
##### v125
=> '=7D',
##### v126
=> '=7E',
##### v127
=> '=7F',
##### v128
=> '=80',
##### v129
=> '=81',
   
##### v130
=> '=82',
##### v131
=> '=83',
##### v132
=> '=84',
##### v133
=> '=85',
##### v134
=> '=86',
   
##### v135
=> '=87',
##### v136
=> '=88',
##### v137
=> '=89',
##### v138
=> '=8A',
##### v139
=> '=8B',
   
##### v140
=> '=8C',
##### v141
=> '=8D',
##### v142
=> '=8E',
##### v143
=> '=8F',
##### v144
=> '=90',
   
##### v145
=> '=91',
##### v146
=> '=92',
##### v147
=> '=93',
##### v148
=> '=94',
##### v149
=> '=95',
   
##### v150
=> '=96',
##### v151
=> '=97',
##### v152
=> '=98',
##### v153
=> '=99',
##### v154
=> '=9A',
   
##### v155
=> '=9B',
##### v156
=> '=9C',
##### v157
=> '=9D',
##### v158
=> '=9E',
##### v159
=> '=9F',
   
##### v160
=> '=A0',
##### v161
=> '=A1',
##### v162
=> '=A2',
##### v163
=> '=A3',
##### v164
=> '=A4',
   
##### v165
=> '=A5',
##### v166
=> '=A6',
##### v167
=> '=A7',
##### v168
=> '=A8',
##### v169
=> '=A9',
   
##### v170
=> '=AA',
##### v171
=> '=AB',
##### v172
=> '=AC',
##### v173
=> '=AD',
##### v174
=> '=AE',
   
##### v175
=> '=AF',
##### v176
=> '=B0',
##### v177
=> '=B1',
##### v178
=> '=B2',
##### v179
=> '=B3',
   
##### v180
=> '=B4',
##### v181
=> '=B5',
##### v182
=> '=B6',
##### v183
=> '=B7',
##### v184
=> '=B8',
   
##### v185
=> '=B9',
##### v186
=> '=BA',
##### v187
=> '=BB',
##### v188
=> '=BC',
##### v189
=> '=BD',
   
##### v190
=> '=BE',
##### v191
=> '=BF',
##### v192
=> '=C0',
##### v193
=> '=C1',
##### v194
=> '=C2',
   
##### v195
=> '=C3',
##### v196
=> '=C4',
##### v197
=> '=C5',
##### v198
=> '=C6',
##### v199
=> '=C7',
   
##### v200
=> '=C8',
##### v201
=> '=C9',
##### v202
=> '=CA',
##### v203
=> '=CB',
##### v204
=> '=CC',
   
##### v205
=> '=CD',
##### v206
=> '=CE',
##### v207
=> '=CF',
##### v208
=> '=D0',
##### v209
=> '=D1',
   
##### v210
=> '=D2',
##### v211
=> '=D3',
##### v212
=> '=D4',
##### v213
=> '=D5',
##### v214
=> '=D6',
   
##### v215
=> '=D7',
##### v216
=> '=D8',
##### v217
=> '=D9',
##### v218
=> '=DA',
##### v219
=> '=DB',
   
##### v220
=> '=DC',
##### v221
=> '=DD',
##### v222
=> '=DE',
##### v223
=> '=DF',
##### v224
=> '=E0',
   
##### v225
=> '=E1',
##### v226
=> '=E2',
##### v227
=> '=E3',
##### v228
=> '=E4',
##### v229
=> '=E5',
   
##### v230
=> '=E6',
##### v231
=> '=E7',
##### v232
=> '=E8',
##### v233
=> '=E9',
##### v234
=> '=EA',
   
##### v235
=> '=EB',
##### v236
=> '=EC',
##### v237
=> '=ED',
##### v238
=> '=EE',
##### v239
=> '=EF',
   
##### v240
=> '=F0',
##### v241
=> '=F1',
##### v242
=> '=F2',
##### v243
=> '=F3',
##### v244
=> '=F4',
   
##### v245
=> '=F5',
##### v246
=> '=F6',
##### v247
=> '=F7',
##### v248
=> '=F8',
##### v249
=> '=F9',
   
##### v250
=> '=FA',
##### v251
=> '=FB',
##### v252
=> '=FC',
##### v253
=> '=FD',
##### v254
=> '=FE',
   
##### v255
=> '=FF'
    );

  /**
   * A map of non-encoded ascii characters.
   * @var string[]
   * @access protected
   */
  protected $_safeMap = array();

  /**
   * Creates a new QpEncoder for the given CharacterStream.
   * @param Swift_CharacterStream $charStream to use for reading characters
   * @param Swift_StreamFilter $filter if input should be canonicalized
   */
  public function __construct(Swift_CharacterStream $charStream,
    Swift_StreamFilter $filter = null)
  {
    $this->_charStream = $charStream;
    foreach (array_merge(
      array(0x09, 0x20), range(0x21, 0x3C), range(0x3E, 0x7E)) as $byte)
    {
      $this->_safeMap[$byte] = chr($byte);
    }
    $this->_filter = $filter;
  }

  /**
   * Takes an unencoded string and produces a QP encoded string from it.
   * QP encoded strings have a maximum line length of
##### v76
characters.
   * If the first line needs to be shorter, indicate the difference with
   * $firstLineOffset.
   * @param string $string to encode
   * @param int $firstLineOffset, optional
   * @param int $maxLineLength, optional,
##### v0
indicates the default of
##### v76
chars
   * @return string
   */
  public function encodeString($string, $firstLineOffset = 0,
    $maxLineLength = 0)
  {
    if ($maxLineLength >
##### v76
|| $maxLineLength <= 0)
    {
      $maxLineLength = 76;
    }

    $thisLineLength = $maxLineLength - $firstLineOffset;

    $lines = array();
    $lNo = 0;
    $lines[$lNo] = '';
    $currentLine =& $lines[$lNo++];
    $size=$lineLen=0;

    $this->_charStream->flushContents();
    $this->_charStream->importString($string);

    //Fetching more than
##### v4
chars at one is slower, as is fetching fewer bytes
    // Conveniently
##### v4
chars is the UTF-8 safe number since UTF-8 has up to 6
    // bytes per char and (6 *
##### v4
*
##### v3
=
##### v72
chars per line) * =NN is
##### v3
bytes
    while (false !== $bytes = $this->_nextSequence())
    {
      //If we're filtering the input
      if (isset($this->_filter))
      {
        //If we can't filter because we need more bytes
        while ($this->_filter->shouldBuffer($bytes))
        {
          //Then collect bytes into the buffer
          if (false === $moreBytes = $this->_nextSequence(1))
          {
            break;
          }

          foreach ($moreBytes as $b)
          {
            $bytes[] = $b;
          }
        }
        //And filter them
        $bytes = $this->_filter->filter($bytes);
      }

      $enc = $this->_encodeByteSequence($bytes, $size);
      if ($currentLine && $lineLen+$size >= $thisLineLength)
      {
        $lines[$lNo] = '';
        $currentLine =& $lines[$lNo++];
        $thisLineLength = $maxLineLength;
        $lineLen=0;
      }
      $lineLen+=$size;
      $currentLine .= $enc;
    }

    return $this->_standardize(implode("=\r\n", $lines));
  }

  /**
   * Updates the charset used.
   * @param string $charset
   */
  public function charsetChanged($charset)
  {
    $this->_charStream->setCharacterSet($charset);
  }

  // -- Protected methods

  /**
   * Encode the given byte array into a verbatim QP form.
   * @param int[] $bytes
   * @return string
   * @access protected
   */
  protected function _encodeByteSequence(array $bytes, &$size)
  {
    $ret = '';
    $size=0;
    foreach ($bytes as $b)
    {
      if (isset($this->_safeMap[$b]))
      {
        $ret .= $this->_safeMap[$b];
        ++$size;
      }
      else
      {
        $ret .= $this->_qpMap[$b];
        $size+=3;
      }
    }
    return $ret;
  }

  /**
   * Get the next sequence of bytes to read from the char stream.
   * @param int $size number of bytes to read
   * @return int[]
   * @access protected
   */
  protected function _nextSequence($size = 4)
  {
    return $this->_charStream->readBytes($size);
  }

  /**
   * Make sure CRLF is correct and HT/SPACE are in valid places.
   * @param string $string
   * @return string
   * @access protected
   */
  protected function _standardize($string)
  {
    $string = str_replace(array("\t=0D=0A", " =0D=0A", "=0D=0A"),
      array("=09\r\n", "=20\r\n", "\r\n"), $string
      );
    switch ($end = ord(substr($string, -1)))
    {
      case 0x09:
      case 0x20:
        $string = substr_replace($string, $this->_qpMap[$end], -1);
    }
    return $string;
  }

}
