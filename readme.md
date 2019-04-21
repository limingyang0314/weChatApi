## 整体情况

搜索接口和用户相关接口单独提供文档，其它接口如果出现问题可以随时向我反映。

## 用户验证与用户信息

单独附上文档说明




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

https://wechatmore.xyz:666/api/articles.php?secondType=select_article_by_id&ID=1
| 方法 | aID |
| ------ | ------ |
| GET | 文章ID |
```json
{
    "error_code":-1,
    "message":null,
    "result":[
        {
            "ID": "1",
            "content": "新的一年伊始\r\n牵动千万游子心的海棠季\r\n即将拉开帷幕\r\n又一年海棠花开\r\n我们等你缓缓归矣\r\n今年的海棠季专属明信片\r\n仍然由你来定义\r\n快来选出你心中的最佳明信片吧",
            "comment_num": "3",
            "type_name": "推荐",
            "hot": "5",
            "username": "omingyyfy",
            "avatar": "https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132",
            "time": "2019-03-11 09:01:36",
            "openID": "1111",
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
| 方法 | openID | limit | page |
| ------ | ------ | ------ | ------ |
| GET | 微信标志用户唯一性的ID | 每页多少篇 | 页数 |
注意：考虑到获取多篇文章多作为列表使用，一般不需要获取文章的全部信息，因此考虑到查询数据的优化，每条文章只显示部分信息。

```json
{
    "error_code":-1,
    "message":null,
    "result":[
        {
            "aid":"7",
            "content":"这是文章内容，看上去很nb",
            "comment_num": "3",
            "type_name":"学校信息",
            "hot":"1000",
            "username":"omingyyfy",
            "time":"2019-03-18 13:42:29",
            "openID":"1111"
        },
        {
            "aid":"4",
            "content":"4535434532413412421",
            "comment_num": "3",
            "type_name":"兼职信息",
            "hot":"0",
            "username":"omingyyfy",
            "time":"2019-03-11 09:03:48",
            "openID":"1111"
        },
        {
            "aid":"3",
            "content":"324524524324",
            "comment_num": "3",
            "type_name":"社团活动",
            "hot":"0",
            "username":"omingyyfy",
            "time":"2019-03-11 09:01:45",
            "openID":"1111"
        },
        {
            "aid":"2",
            "content":"tdgbdbdafge",
            "comment_num": "3",
            "type_name":"食堂资讯",
            "hot":"1",
            "username":"omingyyfy",
            "time":"2019-03-11 09:01:43",
            "openID":"1111"
        },
        {
            "aid":"1",
            "content":"hfgbxxdfgb",
            "comment_num": "3",
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
| 方法 | typeID | mode | limit | page |
| ------ | ------ | ------ | ------ | ------ |
| GET | 这是文章的typeID | 1为时间，2为热度 | 每页数量 | 页数 |
```json
{
    "error_code":-1,
    "message":null,
    "result":[
        {
            "aid":"35",
            "content":"hello,world!",
            "comment_num": "3",
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
            "comment_num": "3",
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
            "comment_num": "3",
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
            "comment_num": "3",
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
            "comment_num": "3",
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
            "comment_num": "3",
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
            "comment_num": "3",
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
https://wechatmore.xyz:666/api/items.php?secondType=select_item_by_id&ID=1
```json
{
    "error_code": -1,
    "message": null,
    "result": [
        {
            "ID": "1",
            "username": "omingyyfy",
            "avatar": "https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132",
            "content": "这是土豆,haha",
            "type_name": "旧书",
            "hot": "444",
            "time": "2019-03-23 22:34:31",
            "pictures": [
                {
                    "pURL": "/upload/item_pictures/test.jpg"
                },
                {
                    "pURL": "/upload/hahahah.jpg"
                }
            ]
        }
    ]
}
```

###根据openID获取商品
https://wechatmore.xyz:666/api/items.php?secondType=select_item_by_author&openID=1111&limit=3&page=1
| 方法 | openID | limit | page |
| ------ | ------ | ------ | ------ |
| GET | 微信标志用户唯一性的ID | 每页多少篇 | 页数 |
```json
{
    "error_code": -1,
    "message": null,
    "result": [
        {
            "ID": "7",
            "username": "omingyyfy",
            "avatar": "https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132",
            "content": "hello son",
            "type_name": "旧书",
            "hot": "0",
            "time": "2019-04-18 00:02:49",
            "pictures": []
        },
        {
            "ID": "6",
            "username": "omingyyfy",
            "avatar": "https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132",
            "content": "hello son",
            "type_name": "旧书",
            "hot": "0",
            "time": "2019-04-07 22:42:18",
            "pictures": []
        },
        {
            "ID": "5",
            "username": "omingyyfy",
            "avatar": "https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132",
            "content": "hello son",
            "type_name": "旧书",
            "hot": "0",
            "time": "2019-04-07 22:41:49",
            "pictures": []
        }
    ]
}
```

###根据类型获取商品
https://wechatmore.xyz:666/api/items.php?secondType=select_item_by_type&type=1&limit=3&page=1
| 方法 | type | limit | page |
| ------ | ------ | ------ | ------ |
| GET | 商品类型的ID | 每页多少篇 | 页数 |
```json
{
    "error_code": -1,
    "message": null,
    "result": [
        {
            "ID": "7",
            "username": "omingyyfy",
            "avatar": "https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132",
            "content": "hello son",
            "type_name": "旧书",
            "hot": "0",
            "time": "2019-04-18 00:02:49",
            "pictures": [
                {
                    "pURL": "/upload/item_pictures/item_pictures_1554652969 _1 .png"
                }
            ]
        },
        {
            "ID": "6",
            "username": "omingyyfy",
            "avatar": "https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132",
            "content": "hello son",
            "type_name": "旧书",
            "hot": "0",
            "time": "2019-04-07 22:42:18",
            "pictures": []
        },
        {
            "ID": "5",
            "username": "omingyyfy",
            "avatar": "https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132",
            "content": "hello son",
            "type_name": "旧书",
            "hot": "0",
            "time": "2019-04-07 22:41:49",
            "pictures": []
        }
    ]
}
```

###根据openID获取商品
```json
{
    "error_code": -1,
    "message": null,
    "result": [
        {
            "ID": "7",
            "username": "omingyyfy",
            "avatar": "https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132",
            "content": "hello son",
            "type_name": "旧书",
            "hot": "0",
            "time": "2019-04-18 00:02:49",
            "pictures": [
                {
                    "pURL": "/upload/item_pictures/item_pictures_1554652969 _1 .png"
                }
            ]
        },
        {
            "ID": "6",
            "username": "omingyyfy",
            "avatar": "https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132",
            "content": "hello son",
            "type_name": "旧书",
            "hot": "0",
            "time": "2019-04-07 22:42:18",
            "pictures": []
        },
        {
            "ID": "5",
            "username": "omingyyfy",
            "avatar": "https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132",
            "content": "hello son",
            "type_name": "旧书",
            "hot": "0",
            "time": "2019-04-07 22:41:49",
            "pictures": []
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
```json
{
    "error_code":-1,
    "message":null,
    "result":{
        "iID":"7"
    }
}
```


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
            "openID":"1111",
            "username":"omingyyfy",
            "avatar":"https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132",
            "content":"新的一年伊始
牵动千万游子心的海棠季
即将拉开帷幕
又一年海棠花开
我们等你缓缓归矣
今年的海棠季专属明信片
仍然由你来定义
快来选出你心中的最佳明信片吧",
            "time":"2019-03-11 13:43:52"
        },
        {
            "aID":"2",
            "openID":"1111",
            "username":"omingyyfy",
            "avatar":"https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132",
            "content":"天津大学是教育部直属国家重点大学，也是985工程、211工程首批高校。学校创建于1895年，前身为北洋大学",
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
            "openID":"1111",
            "username":"omingyyfy",
            "avatar":"https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132",
            "item_info":"这是土豆,haha",
            "time":"2019-03-23 22:34:31"
        },
        {
            "iID":"2",
            "openID":"1111",
            "username":"omingyyfy",
            "avatar":"https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132",
            "item_info":"这是西瓜,hoho",
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

###写一级评论

一级评论就是直接对文章或商品进行评论

https://wechatmore.xyz:666/api/comments.php?secondType=insert_comment&cType=1&pointerID=1&openID=1111&content=helloWorld
| 方法 | cType | pointerID | openID | content |
| ------ | ------ | ------ | ------ | ------ |
| GET | 1是文章，2是商品| 文章或商品ID | 就是open ID | 评论内容 |
```json
{
    "error_code":-1,
    "message":null,
    "result":"insert success!"
}
```

### 写二级评论

二级评论是对文章的评论或者商品的评论进行评论

https://wechatmore.xyz:666/api/comments.php?secondType=insert_comment_secondType&cType=1&pointerID=1&pointerID2=2&openID=1111&content=helloWorld
| 方法 | cType | pointerID | pointerID2 | openID | content |
| ------ | ------ | ------ | ------ | ------ | ------ |
| GET | 3是文章评论，4是商品评论 | 文章或商品ID | 这个是被评论的评论的c ID | 就是open ID | 评论内容 |
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

https://wechatmore.xyz:666/api/comments.php?secondType=select_comment_by_id&ID=1
| 方法 | cid |
| ------ | ------ |
| POST | 具体某篇评论的评论id |
```json
{
    "error_code": -1,
    "message": null,
    "result": [
        {
            "ID": "2",
            "cType": "1",
            "username": "omingyyfy",
            "avatar": "https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132",
            "content": "这是一条评论",
            "time": "2019-03-23 22:33:30"
        }
    ]
}
```

###根据文章或商品ID获取该文章或商品的全部评论(已增加分页)
https://wechatmore.xyz:666/api/comments.php?secondType=select_comment_by_pointerID&cType=1&pointerID=1&page=1&limit=4
| 方法 | cType | pointerID |
| ------  | ------ | ------ |
| POST  | 1是文章的评论，2是商品留言 | 对应文章或商品的ID |
```json
{
    "error_code": -1,
    "message": null,
    "result": [
        {
            "ID": "23",
            "cType": "1",
            "username": "omingyyfy",
            "avatar": "https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132",
            "content": "helloWorld",
            "time": "2019-04-19 20:44:44"
        },
        {
            "ID": "22",
            "cType": "1",
            "username": "omingyyfy",
            "avatar": "https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132",
            "content": "helloWorld",
            "time": "2019-04-19 20:15:24"
        },
        {
            "ID": "21",
            "cType": "1",
            "username": "omingyyfy",
            "avatar": "https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132",
            "content": "helloWorld",
            "time": "2019-04-19 20:14:24"
        },
        {
            "ID": "20",
            "cType": "1",
            "username": "omingyyfy",
            "avatar": "https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132",
            "content": "helloWorld",
            "time": "2019-04-19 20:14:12"
        }
    ]
}
```

###根据openID获取某人的评论(已分页)
用法基本同上一个接口，传参直接参照url
https://wechatmore.xyz:666/api/comments.php?secondType=select_comment_by_openID&cType=1&pointerID=1&limit=4&page=1
```json
{
    "error_code": -1,
    "message": null,
    "result": [
        {
            "ID": "23",
            "cType": "1",
            "username": "omingyyfy",
            "avatar": "https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132",
            "content": "helloWorld",
            "time": "2019-04-19 20:44:44",
            "pointerID": "1",
            "pointerID2": "2"
        },
        {
            "ID": "22",
            "cType": "1",
            "username": "omingyyfy",
            "avatar": "https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132",
            "content": "helloWorld",
            "time": "2019-04-19 20:15:24",
            "pointerID": "1",
            "pointerID2": null
        },
        {
            "ID": "21",
            "cType": "1",
            "username": "omingyyfy",
            "avatar": "https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132",
            "content": "helloWorld",
            "time": "2019-04-19 20:14:24",
            "pointerID": "1",
            "pointerID2": "1"
        },
        {
            "ID": "20",
            "cType": "1",
            "username": "omingyyfy",
            "avatar": "https://wx.qlogo.cn/mmopen/vi_32/SflhBPd2HUIRjQRfmAsRlJzlF1goPsMC1GYiaLibwWuew9oeAUqsCmg6ff1HXt7VUoicsYndpQvwbzhhzJaRMTFOA/132",
            "content": "helloWorld",
            "time": "2019-04-19 20:14:12",
            "pointerID": "1",
            "pointerID2": "1"
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

###获取某一板块的所有banner，以时间降序
https://wechatmore.xyz:666/api/pictures.php?secondType=get_banner_by_type&first_type=1&second_type=1
| 方法 | first_type | second_type |
| ------  | ------ | ------ |
| GET  | 大类ID，1为文章，2为商品 | 小类ID |
```json
{
    "error_code":-1,
    "message":null,
    "result":[
        {
            "bID":"15",
            "b_name":"banners_1553427061.png",
            "time":"2019-03-24 19:31:01",
            "first_typeID":"1",
            "second_typeID":"1"
        },
        {
            "bID":"14",
            "b_name":"banners_1553427052.png",
            "time":"2019-03-24 19:30:52",
            "first_typeID":"1",
            "second_typeID":"1"
        },
        {
            "bID":"13",
            "b_name":"banners_1553427044.png",
            "time":"2019-03-24 19:30:44",
            "first_typeID":"1",
            "second_typeID":"1"
        },
        {
            "bID":"12",
            "b_name":"banners_1553427035.png",
            "time":"2019-03-24 19:30:35",
            "first_typeID":"1",
            "second_typeID":"1"
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
