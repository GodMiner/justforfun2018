# -*- coding: UTF-8 -*-
import requests
import re
import sys

#get url in the same ip
def get_room_rating(roomid):

    try:
        req = requests.get('https://www.xxx.com/rooms/' + roomid)
    except:
        print 'Failed to open url,you can try again...'
        return
    #print req.encoding
    #print req.content
    pattern = re.compile(r'<span role="img" aria-label="Rating (.+?)out of 5">')
    match = pattern.findall(req.content)
    if match:
        print match[0]
        # for m in match:
        #     print m  
    else:
        print 'find nothing...'

    pattern2 = re.compile(r'<h2 tabindex="-1" class="_1xu9tpch">(.+?)</h2>')
    #print req.content
    match2 = pattern2.findall(req.content)
    if match2:
        print match2[0]
        # for m in match:
        #     print m  
    else:
        print 'find nothing...'

#entry point
if __name__ == '__main__':
    print 'start...'
    roomid =  "1838274"
    #534650 - 5 (238)  Updated today
    #668799 - 4.5 (402)   Updated 1 day ago
    #9875719 - 5 (243)   Updated today
    #706572 - 4 (249)  Updated today
    #2642991 - 4.5 （219) Updated 23 days ago
    #1838274 - 5 (147)  Updated today
    roomids = ["534650", "668799", "9875719", "706572", "2642991", "1838274"]
    #get_room_rating(roomid)
    for id in roomids:
        get_room_rating(id)
        print '----------'
    print 'end...'
