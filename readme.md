## 整体情况

由于目前对用户的相关接口仍需讨论，以下接口大多未添加用户参数，或在后台暂时写死了open ID，或直接让前端传open ID到后台， 这些都是临时的， 相关问题讨论完毕后将对所有接口一并修改。

此外，涉及数据安全的问题，比如接口调用时的验证，也要在讨论后一并解决。

此外外，建议前端把BASE_URL单独写出来，不要直接完整复制URL，我可能在之后会换域名。



## 用户验证与用户信息

### 根据微信返回的code获取open ID

https://wechatmore.xyz:666/api/users.php?secondType=get_openID&code=1111

| 方法 | code |
| ------ | ------ |
| GET | 微信返回 |

```json
{
    "session_key":"IsF3LyFRIirnD7+EbH5vtg==",
    "openid":"omfHM4iU0EA1jCLmUh43itEhtpcc"
}
```

### 根据open ID获取对应用户的信息
| 方法 | open ID |
| ------ | ------ |
| GET | 微信标志用户唯一性的ID |
```json
{
    "error_code":-1,
    "message":null,
    "result":[
        {
            "openID":"1111",
            "username":"omingyyfy",
            "avatar":"1.jpg",
            "location_name":"天津市",
            "school_name":"天津大学"
        }
    ]
}
```
### 登陆
基本定型，但还未写完，请勿使用，争取本周末做完
原则：每次登陆时，将code和其它非敏感信息发给本接口，后台将会把code解析成openID
https://wechatmore.xyz:666/api/users.php?secondType=login&openID=1111&session_key=aaaa&username=aaaa&avatar=bbbb
| 方法 | code | username | avatar |
| ------ | ------ | ------ | ------ |
| GET | code | 微信提供的用户名 | 微信提供的头像|

###获取用户的信息
由于登陆操作不会经常进行，登陆后也要频繁获取用户的信息，将通过此接口获取用户信息
还未完成




## 文章的获取与发布相关

### 获取全部文章类型
https://wechatmore.xyz:666/api/types.php?secondType=get_article_types
```json
{
    "error_code":-1,
    "message":null,
    "result":[
        {
            "type_id":"1",
            "type_name":"推荐"
        },
        {
            "type_id":"2",
            "type_name":"学校"
        },
        {
            "type_id":"3",
            "type_name":"食堂"
        },
        {
            "type_id":"4",
            "type_name":"社团"
        },
        {
            "type_id":"5",
            "type_name":"失物招领"
        },
        {
            "type_id":"6",
            "type_name":"兼职"
        },
        {
            "type_id":"7",
            "type_name":"就业"
        }
    ]
}
```




### 按文章ID获取一篇文章

https://wechatmore.xyz:666/api/articles.php?secondType=select_article_by_id&aID=1
| 方法 | aID |
| ------ | ------ |
| GET | 文章ID |
```json
{
    "error_code":-1,
    "message":null,
    "result":[
        {
            "aid":"36",
            "content":"测试2张图片",
            "type_name":"推荐",
            "hot":"0",
            "username":"omingyyfy",
            "time":"2019-03-27 21:40:21",
            "openID":"1111",
            "pictures":[
                {
                    "pURL":"/upload/article_pictures/article_pictures_1553694021.png"
                },
                {
                    "pURL":"/upload/article_pictures/article_pictures_1553694022.jpg"
                }
            ]
        }
    ]
}
```



### 按openID获取某一作者的所有文章

https://wechatmore.xyz:666/api/articles.php?secondType=select_article_by_author&openID=1111
| 方法 | openID |
| ------ | ------ |
| GET | 微信标志用户唯一性的ID |
注意：考虑到获取多篇文章多作为列表使用，一般不需要获取文章的全部信息，因此考虑到查询数据的优化，每条文章只显示部分信息。

```json
{
    "error_code":-1,
    "message":null,
    "result":[
        {
            "aid":"7",
            "content":"这是文章内容，看上去很nb",
            "type_name":"学校信息",
            "hot":"1000",
            "username":"omingyyfy",
            "time":"2019-03-18 13:42:29",
            "openID":"1111"
        },
        {
            "aid":"4",
            "content":"4535434532413412421",
            "type_name":"兼职信息",
            "hot":"0",
            "username":"omingyyfy",
            "time":"2019-03-11 09:03:48",
            "openID":"1111"
        },
        {
            "aid":"3",
            "content":"324524524324",
            "type_name":"社团活动",
            "hot":"0",
            "username":"omingyyfy",
            "time":"2019-03-11 09:01:45",
            "openID":"1111"
        },
        {
            "aid":"2",
            "content":"tdgbdbdafge",
            "type_name":"食堂资讯",
            "hot":"1",
            "username":"omingyyfy",
            "time":"2019-03-11 09:01:43",
            "openID":"1111"
        },
        {
            "aid":"1",
            "content":"hfgbxxdfgb",
            "type_name":"学校信息",
            "hot":"5",
            "username":"omingyyfy",
            "time":"2019-03-11 09:01:36",
            "openID":"1111"
        }
    ]
}
```



###按分类获取文章，并按时间或热度排序

https://wechatmore.xyz:666/api/articles.php?secondType=select_article_by_type&typeID=1&mode=1
| 方法 | typeID | mode |
| ------ | ------ | ------ |
| GET | 这是文章的typeID | 1为时间，2为热度 |
```json
{
    "error_code":-1,
    "message":null,
    "result":[
        {
            "aid":"35",
            "content":"hello,world!",
            "type_name":"学校信息",
            "hot":"0",
            "username":"omingyyfy",
            "time":"2019-03-18 15:04:57",
            "openID":"1111",
            "pictures":[
                {
                    "pURL":"/upload/article_pictures/article_pictures_1552892697.png"
                }
            ]
        },
        {
            "aid":"34",
            "content":"hello,world!",
            "type_name":"学校信息",
            "hot":"0",
            "username":"omingyyfy",
            "time":"2019-03-18 15:03:22",
            "openID":"1111",
            "pictures":[
                {
                    "pURL":"/upload/article_pictures/article_pictures_1552892602.png"
                }
            ]
        },
        {
            "aid":"31",
            "content":"hello,world!",
            "type_name":"学校信息",
            "hot":"0",
            "username":"omingyyfy",
            "time":"2019-03-18 15:00:54",
            "openID":"1111",
            "pictures":[
                {
                    "pURL":"/upload/article_pictures/article_pictures_1552892454.png"
                }
            ]
        },
        {
            "aid":"27",
            "content":"hello,world!",
            "type_name":"学校信息",
            "hot":"0",
            "username":"omingyyfy",
            "time":"2019-03-18 14:46:39",
            "openID":"1111",
            "pictures":[
                {
                    "pURL":"/upload/article_pictures/article_pictures_1552891599.png"
                }
            ]
        },
        {
            "aid":"26",
            "content":"hello,world!",
            "type_name":"学校信息",
            "hot":"0",
            "username":"omingyyfy",
            "time":"2019-03-18 14:45:55",
            "openID":"1111",
            "pictures":[

            ]
        },
        {
            "aid":"25",
            "content":"hello,world!",
            "type_name":"学校信息",
            "hot":"0",
            "username":"omingyyfy",
            "time":"2019-03-18 14:45:32",
            "openID":"1111",
            "pictures":[

            ]
        },
        {
            "aid":"24",
            "content":"hello,world!",
            "type_name":"学校信息",
            "hot":"0",
            "username":"omingyyfy",
            "time":"2019-03-18 14:44:42",
            "openID":"1111",
            "pictures":[

            ]
        }
            ]
        }
    ]
}
```



### 写文章

终于测试完写文章的接口了，openID在今后的版本中可能不需要前端传过来，我在后端直接保存，不过这一版需要传，也便于各位测试。
所有图片目前只支持("gif", "jpeg", "jpg", "png")这四种格式，可以再加，请联系我。
返回值里的aID是发布成功后的文章ID号，可以根据这个直接做跳转。

https://wechatmore.xyz:666/api/articles.php?secondType=insert_article&openID=1111
| 方法 | openID | article_type | content | file1 | file2 | file3 |
| ------ | ------ | ------ | ------ | ------ | ------ | ------ |
| POST | openID是get传的 | 文章类型ID | 文章内容 | 选填 图片1 | 选填 图片2 | 选填 图片3 |
```json
{
    "error_code":-1,
    "message":null,
    "result":{
        "aID":"35"
    }
}
```

### 删除文章

现在删除文章要手动传open ID，以验证是否为作者，在后期版本的接口中， 前端将不需要手动传open ID

https://wechatmore.xyz:666/api/articles.php?secondType=delete_article&openID=1111&aID=7
| 方法 | openID | aID |
| ------ | ------ | ------ |
| GET | 就是open ID | 文章的ID号 |
```json
{
    "error_code":-1,
    "message":null,
    "result":"delete success!"
}
```

## 商品相关

### 获取全部商品类型
https://wechatmore.xyz:666/api/types.php?secondType=get_item_types
```json
{
    "error_code":-1,
    "message":null,
    "result":[
        {
            "type_id":"1",
            "type_name":"旧书"
        },
        {
            "type_id":"2",
            "type_name":"日用品"
        }
    ]
}
```
###根据商品ID获取商品
https://wechatmore.xyz:666/api/items.php?secondType=select_item_by_id&openID=1111&iID=1
```json
{
    "error_code":-1,
    "message":null,
    "result":[
        {
            "iID":"1",
            "username":"omingyyfy",
            "item_info":"这是土豆",
            "type_name":"旧书",
            "hot":"444",
            "time":"2019-03-23 22:34:31",
            "pictures":[
                {
                    "pURL":"/upload/item_pictures/test.jpg"
                },
                {
                    "pURL":"/upload/hahahah.jpg"
                }
            ]
        }
    ]
}
```

###根据openID获取商品
https://wechatmore.xyz:666/api/items.php?secondType=select_item_by_author&openID=1111
```json
{
    "error_code":-1,
    "message":null,
    "result":[
        {
            "iID":"1",
            "username":"omingyyfy",
            "item_info":"这是土豆",
            "type_name":"旧书",
            "hot":"444",
            "time":"2019-03-23 22:34:31",
            "pictures":[
                {
                    "pURL":"/upload/item_pictures/test.jpg"
                },
                {
                    "pURL":"/upload/hahahah.jpg"
                }
            ]
        },
        {
            "iID":"2",
            "username":"omingyyfy",
            "item_info":"这是西瓜",
            "type_name":"日用品",
            "hot":"555",
            "time":"2019-03-23 22:34:31",
            "pictures":[

            ]
        }
    ]
}
```

###发布商品
所有图片目前只支持("gif", "jpeg", "jpg", "png")这四种格式，可以再加，请联系我。
返回值里的iID是发布成功后的商品ID号，可以根据这个直接做跳转。
https://wechatmore.xyz:666/api/items.php?secondType=insert_item&openID=1111
| 方法 | openID | item_type | item_info | file1 | file2 | file3 |
| ------ | ------ | ------ | ------ | ------ | ------ | ------ |
| POST | openID是get传的 | 商品类型ID | 商品介绍 | 选填 图片1 | 选填 图片2 | 选填 图片3 |


## 收藏的获取，添加以及热度相关

收藏会自动为相应文章和商品增加热度，无需额外的接口，而分享则单独提供了一个接口，当用户进行分享行为时，前端应调用相应的接口为热度加一。

### 为当前用户添加一条收藏

https://wechatmore.xyz:666/api/collections.php?secondType=insert_colletion&openID=1111&type=1&id=2
| 方法 | openID | type | id |
| ------ | ------ | ------ | ------ |
| GET | 就是openID呗 | 1为文章，2为商品 | 对应的文章或商品ID |

```json
如果成功：
{
    "error_code":-1,
    "message":null,
    "result":{
        "result":"insert success!"
    }
}
如果失败：
{
    "error_code":-1,
    "message":null,
    "result":{
        "result":"insert fail!"
    }
}
```

###获取文章收藏
https://wechatmore.xyz:666/api/collections.php?secondType=select_article_collection&openID=1111
```json
{
    "error_code":-1,
    "message":null,
    "result":[
        {
            "aID":"1",
            "title":"这是第一篇文章",
            "time":"2019-03-11 13:43:52"
        },
        {
            "aID":"2",
            "title":"这是第二篇文章",
            "time":"2019-03-13 19:33:30"
        }
    ]
}
```

###获取商品收藏
https://wechatmore.xyz:666/api/collections.php?secondType=select_item_collection&openID=1111
```json
{
    "error_code":-1,
    "message":null,
    "result":[
        {
            "iID":"1",
            "item_info":"这是土豆",
            "time":"2019-03-23 22:34:31"
        },
        {
            "iID":"2",
            "item_info":"这是西瓜",
            "time":"2019-03-23 22:34:31"
        }
    ]
}
```


### 分享增加热度

https://wechatmore.xyz:666/api/share.php?secondType=hotter&type=1&id=1
| 方法 | type | id |
| ------ | ------ | ------ |
| GET | 1是分享文章，2是分享商品 | 对应的文章或商品ID |
```json
如果成功：
{
    "error_code":-1,
    "message":null,
    "result":{
        "result":"update success!"
    }
}
如果失败：
{
    "error_code":-1,
    "message":null,
    "result":{
        "result":"update fail!"
    }
}
```

##评论相关

###写评论
https://wechatmore.xyz:666/api/comments.php?secondType=insert_comment&cType=1&pointerID=1&openID=1111&content=helloWorld
| 方法 | cType | pointerID | openID | content |
| ------ | ------ | ------ | ------ | ------ |
| GET | 1是文章2是商品 | 文章或商品ID | 就是openID | 评论内容 |
```json
{
    "error_code":-1,
    "message":null,
    "result":"insert success!"
}
```



### 删除评论

https://wechatmore.xyz:666/api/comments.php?secondType=delete_comment&openID=1111&cID=1
| 方法 | openID | cID |
| ------ | ------ | ------ |
| GET | 就是open ID | 评论的ID号 |
```json
{
    "error_code":-1,
    "message":null,
    "result":"delete success!"
}
```



###根据评论的ID获取具体某条评论的所有信息

https://wechatmore.xyz:666/api/comments.php?secondType=select_comment_by_id&cid=1
| 方法 | cid |
| ------ | ------ |
| POST | 具体某篇评论的评论id |
```json
{
    "error_code":-1,
    "message":null,
    "result":[
        {
            "cid":"3",
            "username":"omingyyfy",
            "content":"这是一条评论",
            "time":"2019-03-23 22:33:30"
        }
    ]
}
```

###根据文章或商品ID获取该文章或商品的全部评论
https://wechatmore.xyz:666/api/comments.php?secondType=select_comment_by_pointerID&cType=1&pointerID=1
| 方法 | cType | pointerID |
| ------  | ------ | ------ |
| POST  | 1是文章的评论，2是商品留言 | 对应文章或商品的ID |
```json
{
    "error_code":-1,
    "message":null,
    "result":[
        {
            "cid":"1",
            "username":"omingyyfy",
            "content":"这是一条评论"
        },
        {
            "cid":"2",
            "username":"omingyyfy",
            "content":"这是一条评论"
        },
        {
            "cid":"3",
            "username":"omingyyfy",
            "content":"这是一条评论"
        }
    ]
}
```


## 后台控制相关

### 上传banner

https://wechatmore.xyz:666/api/pictures.php?secondType=upload_banner
| 方法 | file | first_typeID | second_typeID |
| ------ | ------ | ------ | ------ |
| POST | 要传的图片，允许的格式 gif, jpeg, jpg, p n g | 大类ID 1文章 2商品 | 小类ID |

### 获取最新的多条banner

https://wechatmore.xyz:666/api/pictures.php?secondType=get_banner&number=2

| 方法 | number |
| ------ | ------ |
| GET | 最新的banner条数 |
```json
{
    "error_code":-1,
    "message":null,
    "result":[
        {
            "bID":"2",
            "b_name":"banner_1552275312.jpg",
            "time":"2019-03-11 11:35:12"
        },
        {
            "bID":"1",
            "b_name":"-1a2153fb14ed0430.jpg",
            "time":"2019-03-11 11:27:55"
        }
    ]
}
```



### 删除banner

https://wechatmore.xyz:666/api/pictures.php?secondType=delete_banner&id=2
| 方法 | id |
| ------  | ------ |
| GET  | banner的ID |
```json
{
    "error_code":-1,
    "message":null,
    "result":"我觉得ok"
}
```

####banner的使用

https://wechatmore.xyz:666/upload/banners/{b_name}
