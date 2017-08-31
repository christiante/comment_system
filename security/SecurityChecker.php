<?php

/**
 * Class SecurityChecker
 */
class SecurityChecker 
{
    /**
     * @param $commentText
     * @return string
     */
    public function wordsFilter($commentText) 
    {
        $badWordsArray = file('security/keywords.txt');
        $badWordsPattern='/(\b'.implode('\b)|(\b', $badWordsArray).'\b)/i';
        $badWordsPattern = preg_replace('[\r\n]', '', $badWordsPattern);       

        if (preg_match_all($badWordsPattern, $commentText, $matches)) {
            $search = array();
            $replace = array();       
            foreach ($matches[0] as $matche){
                array_push($search, $matche);
                array_push($replace, "<b>".$matche."</b>");
            }
            $result = str_replace($search, $replace, $commentText);
            return htmlentities($result);
        } else {
            return "";
        }
    }
}
