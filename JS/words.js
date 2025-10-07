  const wordList = [
          {
            word: "Ephemeral",
            definition: "lasting for a very short time.",
            synonyms: ["transient", "fleeting"],
            antonyms: ["permanent", "enduring"],
            example:
              "Fashions are ephemeral and new ones are created every season.",
          },
          {
            word: "Resilient",
            definition:
              "able to withstand or recover quickly from difficult conditions.",
            synonyms: ["tough", "durable"],
            antonyms: ["fragile", "delicate"],
            example:
              "The community showed a resilient spirit after the natural disaster.",
          },
          {
            word: "Procrastinate",
            definition: "delay or postpone action; put off doing something.",
            synonyms: ["stall", "delay"],
            antonyms: ["hasten", "expedite"],
            example:
              "It's easy to procrastinate when you have a big project due.",
          },
          {
            word: "Ubiquitous",
            definition: "present, appearing, or found everywhere.",
            synonyms: ["omnipresent", "widespread"],
            antonyms: ["rare", "scarce"],
            example: "In the modern world, mobile phones are ubiquitous.",
          },
          {
            word: "Serendipity",
            definition:
              "the occurrence and development of events by chance in a happy or beneficial way.",
            synonyms: ["chance", "luck"],
            antonyms: ["misfortune", "bad luck"],
            example:
              "A fortunate stroke of serendipity led to the discovery of the new species.",
          },
          {
            word: "Mellifluous",
            definition: "sweet or musical; pleasant to hear.",
            synonyms: ["smooth", "melodious"],
            antonyms: ["discordant", "harsh"],
            example: "The singer's mellifluous voice captivated the audience.",
          },
          {
            word: "Plethora",
            definition: "a large or excessive amount of something.",
            synonyms: ["abundance", "surplus"],
            antonyms: ["dearth", "scarcity"],
            example: "He had a plethora of excuses for being late.",
          },
          {
            word: "Disparate",
            definition:
              "essentially different in kind; not able to be compared.",
            synonyms: ["distinct", "dissimilar"],
            antonyms: ["similar", "homogenous"],
            example:
              "They had disparate views on the matter, so no agreement was reached.",
          },
          {
            word: "Inimitable",
            definition:
              "so good or unusual as to be impossible to copy; unique.",
            synonyms: ["peerless", "matchless"],
            antonyms: ["ordinary", "common"],
            example:
              "The artist's inimitable style was instantly recognizable.",
          },
          {
            word: "Alacrity",
            definition: "brisk and cheerful readiness.",
            synonyms: ["eagerness", "willingness"],
            antonyms: ["hesitation", "reluctance"],
            example: "She accepted the new challenge with alacrity.",
          },
          {
            word: "Salient",
            definition: "most noticeable or important.",
            synonyms: ["prominent", "conspicuous"],
            antonyms: ["inconspicuous", "unimportant"],
            example:
              "The salient points of the report were summarized in the introduction.",
          },
          {
            word: "Gregarious",
            definition: "fond of company; sociable.",
            synonyms: ["sociable", "outgoing"],
            antonyms: ["introverted", "reclusive"],
            example:
              "Being a gregarious person, he was often the life of the party.",
          },
          {
            word: "Perfunctory",
            definition: "carried out with a minimum of effort or reflection.",
            synonyms: ["cursory", "hasty"],
            antonyms: ["thorough", "careful"],
            example:
              "He gave a perfunctory nod, showing little interest in the conversation.",
          },
          {
            word: "Absolve",
            definition:
              "declare someone free from guilt, obligation, or punishment.",
            synonyms: ["acquit", "exonerate"],
            antonyms: ["condemn", "blame"],
            example: "The jury absolved the defendant of all charges.",
          },
          {
            word: "Ebullient",
            definition: "cheerful and full of energy.",
            synonyms: ["exuberant", "joyful"],
            antonyms: ["depressed", "lethargic"],
            example:
              "The ebullient crowd cheered as their team scored the winning goal.",
          },
          {
            word: "Capricious",
            definition:
              "given to sudden and unaccountable changes of mood or behavior.",
            synonyms: ["fickle", "unpredictable"],
            antonyms: ["stable", "consistent"],
            example:
              "Her capricious nature made it difficult to plan anything.",
          },
          {
            word: "Enervate",
            definition:
              "cause (someone) to feel drained of energy or vitality.",
            synonyms: ["exhaust", "weaken"],
            antonyms: ["energize", "invigorate"],
            example:
              "The hot weather seemed to enervate the students, leaving them listless.",
          },
          {
            word: "Laconic",
            definition: "using very few words.",
            synonyms: ["brief", "concise"],
            antonyms: ["verbose", "talkative"],
            example:
              "His laconic response suggested he wasn't interested in a long conversation.",
          },
          {
            word: "Pervasive",
            definition:
              "spreading widely throughout an area or a group of people.",
            synonyms: ["widespread", "prevalent"],
            antonyms: ["rare", "confined"],
            example: "The pervasive scent of pine filled the entire forest.",
          },
          {
            word: "Vociferous",
            definition:
              "expressing or characterized by vehement opinions; loud and forceful.",
            synonyms: ["boisterous", "clamorous"],
            antonyms: ["quiet", "reserved"],
            example:
              "The vociferous crowd at the concert cheered loudly for the band.",
          },
          {
            word: "Obfuscate",
            definition: "render obscure, unclear, or unintelligible.",
            synonyms: ["confuse", "blur"],
            antonyms: ["clarify", "illuminate"],
            example:
              "The politician's evasive answers seemed designed to obfuscate the truth.",
          },
          {
            word: "Sycophant",
            definition:
              "a person who acts obsequiously toward someone important in order to gain advantage.",
            synonyms: ["flatterer", "toady"],
            antonyms: ["rebel", "nonconformist"],
            example:
              "The CEO was surrounded by sycophants who agreed with everything he said.",
          },
          {
            word: "Tenacious",
            definition:
              "tending to keep a firm hold of something; clinging or adhering closely.",
            synonyms: ["persistent", "determined"],
            antonyms: ["weak", "yielding"],
            example:
              "Her tenacious grip on her beliefs made her a formidable opponent in debates.",
          },
          {
            word: "Vindicate",
            definition: "clear (someone) of blame or suspicion.",
            synonyms: ["exonerate", "justify"],
            antonyms: ["condemn", "accuse"],
            example: "The new evidence served to vindicate the accused.",
          },
          {
            word: "Zephyr",
            definition: "a gentle, mild breeze.",
            synonyms: ["breeze", "draft"],
            antonyms: ["gale", "storm"],
            example:
              "A zephyr rustled the leaves on the trees, creating a soothing sound.",
          },
          {
            word: "Quintessential",
            definition:
              "representing the most perfect or typical example of a quality or class.",
            synonyms: ["typical", "classic"],
            antonyms: ["atypical", "uncharacteristic"],
            example: "She is the quintessential example of grace and elegance.",
          },
          {
            word: "Ineffable",
            definition:
              "too great or extreme to be expressed or described in words.",
            synonyms: ["indescribable", "inexpressible"],
            antonyms: ["definable", "expressible"],
            example:
              "The beauty of the sunset was ineffable, leaving everyone in awe.",
          },
          {
            word: "Obsequious",
            definition:
              "obedient or attentive to an excessive or servile degree.",
            synonyms: ["servile", "sycophantic"],
            antonyms: ["assertive", "domineering"],
            example:
              "His obsequious behavior towards his boss was seen as insincere by his colleagues.",
          },
          {
            word: "Recalcitrant",
            definition:
              "having an obstinately uncooperative attitude toward authority or discipline.",
            synonyms: ["uncooperative", "defiant"],
            antonyms: ["compliant", "obedient"],
            example:
              "The recalcitrant student refused to follow the school's rules.",
          },
          {
            word: "Sagacious",
            definition:
              "having or showing keen mental discernment and good judgment; wise.",
            synonyms: ["wise", "shrewd"],
            antonyms: ["foolish", "unwise"],
            example:
              "The sagacious leader was respected for his ability to make sound decisions.",
          },
          {
            word: "Untenable",
            definition:
              "not able to be maintained or defended against attack or objection.",
            synonyms: ["indefensible", "unsustainable"],
            antonyms: ["defensible", "sustainable"],
            example:
              "The company's financial position became untenable after a series of poor investments.",
          },
          {
            word: "Vicarious",
            definition:
              "experienced in the imagination through the feelings or actions of another person.",
            synonyms: ["indirect", "secondhand"],
            antonyms: ["direct", "personal"],
            example:
              "She lived vicariously through her travel books, dreaming of far-off places.",
          },
          {
            word: "Wistful",
            definition:
              "having or showing a feeling of vague or regretful longing.",
            synonyms: ["nostalgic", "yearning"],
            antonyms: ["content", "satisfied"],
            example:
              "He had a wistful look in his eyes as he reminisced about his childhood.",
          },
          {
            word: "Xenophobia",
            definition:
              "dislike of or prejudice against people from other countries.",
            synonyms: ["racism", "bigotry"],
            antonyms: ["tolerance", "acceptance"],
            example:
              "The rise of xenophobia in the region led to increased tensions between communities.",
          },
          {
            word: "Yen",
            definition: "a strong desire or craving.",
            synonyms: ["craving", "longing"],
            antonyms: ["aversion", "dislike"],
            example:
              "She had a yen for adventure and often traveled to exotic locations.",
          },
          {
            word: "Zealot",
            definition:
              "a person who is fanatical and uncompromising in pursuit of their religious, political, or other ideals.",
            synonyms: ["fanatic", "extremist"],
            antonyms: ["moderate", "centrist"],
            example:
              "The zealot was willing to go to great lengths to promote his cause.",
          },
          {
            word: "Ambivalent",
            definition:
              "having mixed feelings or contradictory ideas about something or someone.",
            synonyms: ["uncertain", "equivocal"],
            antonyms: ["certain", "decisive"],
            example:
              "She felt ambivalent about moving to a new city for her job.",
          },
          {
            word: "Benevolent",
            definition: "well meaning and kindly.",
            synonyms: ["kind", "charitable"],
            antonyms: ["malevolent", "unkind"],
            example: "The benevolent donor gave generously to the orphanage.",
          },
          {
            word: "Cacophony",
            definition: "a harsh, discordant mixture of sounds.",
            synonyms: ["din", "racket"],
            antonyms: ["harmony", "melody"],
            example: "The cacophony of car horns filled the busy street.",
          },
          {
            word: "Dogmatic",
            definition:
              "inclined to lay down principles as incontrovertibly true.",
            synonyms: ["opinionated", "assertive"],
            antonyms: ["open-minded", "flexible"],
            example:
              "His dogmatic approach to teaching left little room for debate.",
          },
          {
            word: "Eloquent",
            definition: "fluent or persuasive in speaking or writing.",
            synonyms: ["articulate", "expressive"],
            antonyms: ["inarticulate", "unexpressive"],
            example:
              "The speaker gave an eloquent speech that moved the audience.",
          },
          {
            word: "Furtive",
            definition:
              "attempting to avoid notice or attention, typically because of guilt or a belief that discovery would lead to trouble.",
            synonyms: ["secretive", "sneaky"],
            antonyms: ["open", "honest"],
            example:
              "He cast a furtive glance at the exit before slipping out.",
          },
          {
            word: "Garrulous",
            definition: "excessively talkative, especially on trivial matters.",
            synonyms: ["chatty", "loquacious"],
            antonyms: ["taciturn", "reserved"],
            example:
              "The garrulous neighbor often kept her up with long stories.",
          },
          {
            word: "Harbinger",
            definition:
              "a person or thing that announces or signals the approach of another.",
            synonyms: ["omen", "forerunner"],
            antonyms: ["result", "consequence"],
            example: "The crocus is a harbinger of spring.",
          },
          {
            word: "Impetuous",
            definition: "acting or done quickly and without thought or care.",
            synonyms: ["rash", "hasty"],
            antonyms: ["cautious", "considered"],
            example: "His impetuous decision led to unforeseen consequences.",
          },
          {
            word: "Juxtapose",
            definition:
              "place or deal with close together for contrasting effect.",
            synonyms: ["compare", "contrast"],
            antonyms: ["separate", "isolate"],
            example:
              "The exhibition juxtaposes modern art with classical sculpture.",
          },
          {
            word: "Keen",
            definition: "having or showing eagerness or enthusiasm.",
            synonyms: ["eager", "enthusiastic"],
            antonyms: ["apathetic", "indifferent"],
            example: "She was keen to start her new job.",
          },
          {
            word: "Lethargic",
            definition: "affected by lethargy; sluggish and apathetic.",
            synonyms: ["sluggish", "inactive"],
            antonyms: ["energetic", "active"],
            example:
              "After the long flight, he felt too lethargic to explore the city.",
          },
          {
            word: "Munificent",
            definition: "more generous than is usual or necessary.",
            synonyms: ["generous", "bountiful"],
            antonyms: ["stingy", "miserly"],
            example:
              "The foundation made a munificent donation to the hospital.",
          },
          {
            word: "Nebulous",
            definition: "in the form of a cloud or haze; hazy.",
            synonyms: ["vague", "unclear"],
            antonyms: ["clear", "distinct"],
            example: "His plans for the future are still nebulous.",
          },
          {
            word: "Obdurate",
            definition:
              "stubbornly refusing to change one's opinion or course of action.",
            synonyms: ["stubborn", "unyielding"],
            antonyms: ["yielding", "flexible"],
            example:
              "Despite the evidence, he remained obdurate in his stance.",
          },
          {
            word: "Paragon",
            definition:
              "a person or thing regarded as a perfect example of a particular quality.",
            synonyms: ["model", "exemplar"],
            antonyms: ["flaw", "imperfection"],
            example: "She is a paragon of patience.",
          },
          {
            word: "Quixotic",
            definition: "exceedingly idealistic; unrealistic and impractical.",
            synonyms: ["impractical", "idealistic"],
            antonyms: ["pragmatic", "realistic"],
            example: "His quixotic quest for perfection frustrated his team.",
          },
          {
            word: "Reverent",
            definition: "feeling or showing deep and solemn respect.",
            synonyms: ["respectful", "devout"],
            antonyms: ["irreverent", "disrespectful"],
            example: "The audience was reverent during the memorial service.",
          },
          {
            word: "Stoic",
            definition:
              "enduring pain and hardship without showing one's feelings or complaining.",
            synonyms: ["impassive", "unemotional"],
            antonyms: ["emotional", "expressive"],
            example: "He remained stoic even in the face of adversity.",
          },
            {
                word: "Tantamount",
                definition:
                "equivalent in seriousness to; virtually the same as.",
                synonyms: ["equivalent", "identical"],
                antonyms: ["different", "unequal"],
                example:
                "His refusal to answer was tantamount to an admission of guilt.",
            },
            {             word: "Urbane",
                definition:
                "courteous and refined in manner.",
                synonyms: ["suave", "sophisticated"],
                antonyms: ["crude", "uncouth"],
                example:
                "The urbane host made everyone feel welcome at the gala.",
            },
            {
                word: "Venerate",
                definition:
                "regard with great respect; revere.",
                synonyms: ["revere", "respect"],
                antonyms: ["disrespect", "despise"],
                example:
                "The community venerates its elders for their wisdom and experience.",
            },
            {
                word: "Whimsical",
                definition:
                "playfully quaint or fanciful, especially in an appealing and amusing way.",
                synonyms: ["playful", "fanciful"],
                antonyms: ["serious", "sober"],
                example:
                "The whimsical decorations at the party delighted the children.",
            },
            {
                word: "Xylophone",
                definition:
                "a musical instrument played by striking a row of wooden bars of graduated length with one or more small wooden or plastic mallets.",
                synonyms: ["instrument", "percussion"],
                antonyms: [],
                example:
                "The musician played a lively tune on the xylophone during the concert.",
            },
            {
                word: "Yearn",
                definition:
                "have an intense feeling of longing for something, typically something that one has lost or been separated from.",
                synonyms: ["long", "crave"],
                antonyms: ["dislike", "reject"],
                example:
                "She yearned for the days when life was simpler and carefree.",
            },
            {
                word: "Zenith",
                definition:
                "the time at which something is most powerful or successful.",
                synonyms: ["peak", "apex"],
                antonyms: ["nadir", "bottom"],
                example:
                "The athlete reached the zenith of his career with a gold medal at the Olympics.",
            },
            {
                word: "Aberration",
                definition: "a departure from what is normal, usual, or expected, typically an unwelcome one.",
                synonyms: ["anomaly", "deviation"],
                antonyms: ["normality", "regularity"],
                example: "The test results showed an aberration from the expected pattern."
            },
            {
                word: "Candor",
                definition: "the quality of being open and honest in expression; frankness.",
                synonyms: ["frankness", "openness"],
                antonyms: ["deceit", "dishonesty"],
                example: "She spoke with candor about the challenges she faced."
            },
            {
                word: "Debacle",
                definition: "a sudden and ignominious failure; a fiasco.",
                synonyms: ["fiasco", "disaster"],
                antonyms: ["success", "triumph"],
                example: "The product launch turned into a debacle for the company."
            },
            {
                word: "Euphoria",
                definition: "a feeling or state of intense excitement and happiness.",
                synonyms: ["elation", "joy"],
                antonyms: ["misery", "depression"],
                example: "Winning the championship filled the team with euphoria."
            },
            {
                word: "Felicity",
                definition: "intense happiness.",
                synonyms: ["happiness", "bliss"],
                antonyms: ["sadness", "unhappiness"],
                example: "She smiled with felicity at the good news."
            },
            {
                word: "Guile",
                definition: "sly or cunning intelligence.",
                synonyms: ["cunning", "craftiness"],
                antonyms: ["honesty", "sincerity"],
                example: "He used guile to escape the tricky situation."
            },
            {
                word: "Hubris",
                definition: "excessive pride or self-confidence.",
                synonyms: ["arrogance", "conceit"],
                antonyms: ["humility", "modesty"],
                example: "His hubris led to his downfall."
            },
            {
                word: "Irascible",
                definition: "having or showing a tendency to be easily angered.",
                synonyms: ["irritable", "short-tempered"],
                antonyms: ["calm", "easygoing"],
                example: "The irascible chef yelled at his staff."
            },
            {
                word: "Jubilant",
                definition: "feeling or expressing great happiness and triumph.",
                synonyms: ["joyful", "elated"],
                antonyms: ["dejected", "disappointed"],
                example: "The crowd was jubilant after the victory."
            },
            {
                word: "Kudos",
                definition: "praise and honor received for an achievement.",
                synonyms: ["praise", "acclaim"],
                antonyms: ["criticism", "blame"],
                example: "She received kudos for her outstanding performance."
            },
            {
                word: "Lurid",
                definition: "very vivid in color, especially so as to create an unpleasantly harsh or unnatural effect.",
                synonyms: ["sensational", "shocking"],
                antonyms: ["muted", "subtle"],
                example: "The newspaper gave a lurid account of the crime."
            },
            {
                word: "Mirth",
                definition: "amusement, especially as expressed in laughter.",
                synonyms: ["glee", "cheerfulness"],
                antonyms: ["gloom", "sadness"],
                example: "The party was full of mirth and laughter."
            },
            {
                word: "Nefarious",
                definition: "wicked or criminal.",
                synonyms: ["evil", "villainous"],
                antonyms: ["good", "virtuous"],
                example: "The villain's nefarious plan was foiled."
            },
            {
                word: "Ostentatious",
                definition: "characterized by vulgar or pretentious display; designed to impress or attract notice.",
                synonyms: ["showy", "pretentious"],
                antonyms: ["modest", "humble"],
                example: "He wore an ostentatious gold watch."
            },
            {
                word: "Pugnacious",
                definition: "eager or quick to argue, quarrel, or fight.",
                synonyms: ["combative", "aggressive"],
                antonyms: ["peaceful", "friendly"],
                example: "The pugnacious boxer never backed down from a challenge."
            },
            {
                word: "Quagmire",
                definition: "a soft boggy area of land that gives way underfoot; a difficult situation.",
                synonyms: ["predicament", "dilemma"],
                antonyms: ["solution", "agreement"],
                example: "They found themselves in a legal quagmire."
            },
            {
                word: "Recalcitrant",
                definition: "having an obstinately uncooperative attitude toward authority or discipline.",
                synonyms: ["defiant", "unruly"],
                antonyms: ["compliant", "obedient"],
                example: "The recalcitrant student refused to follow the rules."
            },
            {
                word: "Sanguine",
                definition: "optimistic or positive, especially in an apparently bad or difficult situation.",
                synonyms: ["optimistic", "hopeful"],
                antonyms: ["pessimistic", "gloomy"],
                example: "She remained sanguine about her chances of success."
            },
            {
                word: "Trepidation",
                definition: "a feeling of fear or agitation about something that may happen.",
                synonyms: ["anxiety", "apprehension"],
                antonyms: ["calm", "composure"],
                example: "He entered the room with some trepidation."
            },
            {
                word: "Ubiquity",
                definition: "the fact of appearing everywhere or of being very common.",
                synonyms: ["omnipresence", "pervasiveness"],
                antonyms: ["rarity", "scarcity"],
                example: "The ubiquity of smartphones is undeniable."
            },
            {
                word: "Voracious",
                definition: "wanting or devouring great quantities of food; having a very eager approach to a particular activity.",
                synonyms: ["insatiable", "greedy"],
                antonyms: ["satisfied", "apathetic"],
                example: "He had a voracious appetite for books."
            },
            {
                word: "Wary",
                definition: "feeling or showing caution about possible dangers or problems.",
                synonyms: ["cautious", "alert"],
                antonyms: ["careless", "reckless"],
                example: "She was wary of strangers."
            },
            {
                word: "Yoke",
                definition: "to join together; a wooden crosspiece fastened over the necks of two animals.",
                synonyms: ["join", "link"],
                antonyms: ["separate", "detach"],
                example: "The two oxen were yoked together."
            },
            {
                word: "Zephyr",
                definition: "a gentle, mild breeze.",
                synonyms: ["breeze", "draft"],
                antonyms: ["gale", "storm"],
                example: "A zephyr cooled the hot afternoon."
            }

        ];

        