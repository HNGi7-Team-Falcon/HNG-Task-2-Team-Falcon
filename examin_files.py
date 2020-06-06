 
# python 3

import os
import re

if __name__ == "__main__":
    files = [x for x in next(os.walk('./scripts'))[2]]
    seen = {}
    res = []
    for file in files:
        num = re.findall('[0-9]+', file)
        for i in num:
            if len(i) == 5:
                if i in seen:
                    res.append((file, seen[i]))
                else:
                    seen[i] = file
    for i in res:
        print(i)