#! /usr/bin/env python3.4

import random
import string

st=string.digits+string.ascii_letters
key=""
for i in range(8):
	key=key+st[random.randrange(len(st))]
print(key)

