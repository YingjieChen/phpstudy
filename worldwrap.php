<?php
	function mb_wordwrap($str, $width = 75,$charset='utf-8',$break = "\n", $cut = false) {
                $lines = explode($break, $str);
                foreach ($lines as &$line) {
                        $line = rtrim($line);
                        if (mb_strlen($line,$charset) <= $width)
                                continue;
                        $words = explode(' ', $line);
                        $line = '';
                        $actual = '';
                        foreach ($words as $word) {
                                if (mb_strlen($actual.$word,$charset) <= $width)
                                        $actual .= $word.' ';
                                else {
                                        if ($actual != '')
                                                $line .= rtrim($actual).$break;
                                                $actual = $word;
                                        if ($cut) {
                                                while (mb_strlen($actual,$charset) > $width) {
                                                        $line .= mb_substr($actual, 0, $width,$charset).$break;
                                                        $actual = mb_substr($actual, $width,$charset);
                                                }
                                        }
                                        $actual .= ' ';
                                }
                        }
                        $line .= trim($actual);
                }
                return implode($break, $lines);
        }
	$string		=	'The mayor of China is retiring, ready to return to his old age with his wife.
In the hundreds of miles, as long as the mayor of China is mentioned,
no one does not praise him, he is the same age as his father,
Shanghai jiaotong has been a top student. After graduating from high school,
he has been working in the provinces since he graduated from high school
People have always been mayor, and every step in China has been very steady and steady.
For more than 30 years, the mayor of China has not forgotten the
cultivation and affection of his hometown, paved the road, donated schools,
To fund lonely and lost children And even though he came back very rarely,
There is no less he, he is always the family tea after dinner.For mayor of China,
the villagers All of them are devoted to profound gratitude and profound friendship.
He has not returned to his hometown in seventeen years Too much guesswork and yearning,
knowing that he was going to go back to his hometown, all showed great kindness and enthusiasm,
The town village committee met continuously to discuss the resettlement plan.
In the sound of "welcome" and the sound of the fireworks,
The mayor of China and his wife came back home with a nanny,
but the mayor of China was so stupid!
Where`s the original stinky tofu stall in the village?
The tofu mill in his dream had become a small supermarket
A childhood favorite, often with the old companion at home to remember that piece of
the smell of strange and incomparable,
The stinky tofu that you can`t throw away, and now stinky tofu is everywhere,
But how can you not have the smell and smell of the original?
Where`s the big pond on the west side of the village?
It was a good place for him to bathe and touch fish as a child,
and in the summer, as long as the guests were at home,
He would go with his father in the water, less than an hour,
to make sure that two bowls of live fish came ashore and sometimes
There will be eel and turtle.And what about the pond root
and the diamond Angle that let him care?
The lotus root, which is white, once ticked up how many times to
the hometown;The corners of the sweet and crisp,
When we go public, our mouths are broken and we can`t lose it.But now...
The hills of the east are now also built of cement plants,
which were when he was a young boy and his companions were cattle,
geese, lard, wild fruit,The best place for hide-and-seek,
where he had so many childhood dreams and childhood pleasures.So far, he remembers clearly,
Several times, he didn`t finish his homework,
and the Chinese teacher drove him down the hill with wicker. Every time he ran away
His teacher could only catch his breath in the back and scold him for the disobedient
bad student.Think about that life,
It`s nice!How could it be smoke billowing all day?The mayor of China has always wondered.
When he was a child, he liked to be behind his mother, and walked in the lane with his rice bowl.
Every family ate what he ate and drank what he drank.Now every
The door door is to guard against burglar door window, look at that one
zhang of the barbed wire fence,make a person gasp to breathe difficult......
Facing the changes of the hometown for decades,
the mayor of China does not know whether to be happy or sad?He was confused.
It was a city too familiar to him.Or his hometown where he has been loving?
Where are you, my dream home?Where are you, my childhood friend?
Actually, the hometown is not far away, she always deep in the bottom of her heart,
it is the homesickness that is difficult to give up,
it is the heart of the heart dream around!';
	$newtext 	= 	mb_wordwrap($string,70,'utf-8', "\n", false);
	echo $newtext;
?>
