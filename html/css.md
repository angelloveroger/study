# CSS
[toc]


#### 1.术语解释
**css = 选择器 + 声明块**

```CSS
h1{
    color: blue;
    text-align: center;
    background-color: #eee;
}
```
a.选择器：选择元素
 *1.id选择器(#id)
 2.class类选择器(.class)
 3.元素选择器*
 |选择器|书写格式|说明|
 |--|--|--|
 |id选择器|#id|根据id属性选择元素|
 |类选择器|.class|根据class属性选择元素|
 |元素选择器|element|根据元素名称选择元素|
 |通配符选择器|*|选择页面所有元素|
 |属性选择器|属性[=/~=/^=/$=属性值]|根据元素属性选择元素|
 |伪类选择器|1).:link：超链接未访问 <br /> 2).:visited：超链接已被访问 <br /> 3).:hover：鼠标悬停 <br /> 4).:active：鼠标按下|选择某些元素的某种状态|
 |伪对象选择器|::before <br /> ::after||

b.声明块
 *大括号包裹起来的若干个声明(属性)，每一个声明表达了某属性的样式规则* 

c.css书写位置
*1.内部样式：即在文档的head元素内添加style元素，在style元素中添加样式规则
 2.内联样式：即将css代码写在页面元素中，只需用分号隔开的一个或多个属性/值对作为元素的style属性和值
 3.外联样式：即将css写在一个单独的外部.css文件中，然后在页面中用link标签引入外部样式文件* 
 ```css
 外联样式引入
<link rel='stylesheet' href='./css/style.css'>
 ```
 **使用外联样式的优点**
 1).可以解决多页面样式重复问题
 2).有利于浏览器缓存，提高页面响应速度
 3).有利于代码分离，更容易阅读和维护

#### 2.常见样式声明
|属性|属性值|属性说明|
|--|--|--|
|color|#008c8c|字体颜色|
|background-color|#f40|背景色|
|font-size|20px/2em...|字体大小|
|font-weight|bold/normal|字体粗细|
|font-family|微软雅黑...|字体|
|font-style|italic|字体样式|
|text-decoration|underline|文本修饰|
|text-indent|2em|文本行首缩进|
|line-height|2em/1.5|文本行高|
|weight|100px|宽度|
|height|30px|高度|
|letter-space|2px|字母间距|
|text-align|left/center/right|文字水平排列方式|

#### 3.层叠
**声明冲突：同样的样式，多次应用到同一个元素**
**层叠：解决声明冲突的过程，由浏览器自动解决**
>解决方法如下：

***1.比较重要性[重要性从高到低]***
*作者样式表：
    1) 作者样式表中!important
    2) 作者样式表中普通样式
    3) 浏览器默认样式表中样式*

***2.比较特殊性[选择器范围越窄越特殊]***
*通过选择器计算一个四位数：
    1) 千位：内联样式，记1
    2) 百位：选择器中所有id选择器数量
    3) 十位：选择器中所有属性，类，伪类选择器的数量
    4) 个位：选择器中所有元素，伪元素选择器的数量*

***3.比较源次序[书写靠后的胜出]***

#### 4.应用
***重置样式表***

#### 5.继承
**子元素会继承父元素的某些css属性[通常与文字相关的属性都会被继承]**

![](./code.jpg)

#### 6.属性值计算过程
**元素从无属性值到每个属性都有值的过程就是属性值计算过程**
- 确定声明值 -> 层叠冲突 -> 使用继承 -> 使用默认值
**inherit：强制继承，将父级属性值强制应用于当前元素
initial：初始值，将该元素恢复到默认值**

---

#### 盒模型
行盒：在页面不换行，display=inline，
块盒：在页面独占一行，display=block
- 盒子组成部分

|从内往外的顺序|组成|属性|
|--|--|--|
|内容|content|width,height|
|填充/内边距|padding|padding-left,padding-right,padding-bottom,padding-top|
|边框|border|
|外边距|margin|




























