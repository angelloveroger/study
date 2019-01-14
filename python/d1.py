#conding=utf-8

#一：单行注释
'''
二：多行注释
多行注释
多行注释
多行注释
多行注释
'''

'''
#三：
#print()  输出字符串，整形......
print('roger')
print('hello,', 'world！')
print(8 + 10 + 10)

#四：
#input()  输入，用于从外部引入变量的值
person = input('请输入名字： ')
print('你的名字是：', person)
'''

'''
#五：
#python数据类型
    #Number:整数，浮点数，复数
num1 = 1
num2 = num3 = 3
num4, num5 = 4, 5
print(num1, num2, num3, num4, num5)
    #String(字符串)
    #Boolean(布尔值)
    #None(空值)
    #list(列表)
    #tuple(元组)
    #dict(字典)
    #set(集合)
'''

'''
#六：
#python标识符：1.只能由字符，数字，下划线组成； 2.不能以数字开头； 3.不能是python关键字
import keyword
print(keyword.kwlist)
'''

'''
#七：
#del 变量名    删除变量
#type(变量名)  变量类型
#id(变量名)    变量地址
'''

a = '10'
b = '10'
c = 10
d = 10
print(id(a))
print(id(b))
print(id(c))
print(id(d))

























