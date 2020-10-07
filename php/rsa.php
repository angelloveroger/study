<?php

/**
 * 一。签名的作用：确保不会有人冒充信息发布方发布虚假信息；
 *      所以私钥用于签名，公钥用于验签。
 *      网络通信中，服务端签名，客户端验签
 *  签名验签流程：
 *      1。签名过程：
 *          ①。将信息内容通过hash算法得到【内容摘要】
 *          ②。再用私钥对【内容摘要】进行加密，得到【数字签名】
 *          ③。将信息内容和【数字签名】同时发送给信息接收者
 *      2。验签过程：
 *          ①。收到信息，用公钥对【数字签名】进行解密，得到【内容摘要】
 *          ②。用接收到的信息内容进行同样的hash算法得到【内容摘要2】
 *          ③。将【内容摘要2】与上一步得到的【内容摘要】进行比对，查看对比结果是否一致，防止被篡改
 *
 * 二。加密的作用：不希望其他人获知消息发布者发布信息的内容，只有指定的人才能看到；
 *      所以公钥用于加密，私钥用于解秘。
 *      网络通信中，客户端加密，服务端解密
 *  加密解密流程：
 *      1.加密过程：
 *          ①。将信息内容用公钥进行加密，发送给接收方
 *      2.解密过程：
 *          ①。接收到密文之后用私钥进行解密，得到信息内容
 */

/**
 * 数字签名的步骤：
 *  服务端
 *      1.使用单向散列函数（HASH函数）对信息生成信息摘要；
 *      2.使用自己的私钥签名信息摘要；
 *      3.把信息本身和已签名的信息摘要一起发送出去；
 *  客户端
 *      1.使用与服务端同一个单向散列函数（HASH函数）对接收的信息本身生成新的信息摘要，
 *      2.再使用服务端的公钥对信息摘要进行验证，以确认信息发送者的身份和信息是否被修改过。
 *
 * 数字加密的步骤：
 *  客户端：
 *      1.首先生成一个对称密钥，用该对称密钥加密要发送的报文；
 *      2.用服务端的公钥加密上述对称密钥；
 *      3.将第一步和第二步的结果结合在一起传给服务端，称为数字信封；
 *  服务端：
 *      1.使用自己的私钥解密被加密的对称密钥，
 *      2.再用此对称密钥解密被客户端加密的密文，得到真正的原文。
 *
 * 数字签名和数字加密的过程虽然都使用公开密钥体系，但实现的过程正好相反，使用的密钥对也不同。
 * 数字签名使用的是发送方的密钥对，发送方用自己的私有密钥进行加密，接收方用发送方的公开密钥进行解密，这是一个一对多的关系，任何拥有发送方公开密钥的人都可以验证数字签名的正确性。
 * 数字加密则使用的是接收方的密钥对，这是多对一的关系，任何知道接收方公开密钥的人都可以向接收方发送加密信息，只有唯一拥有接收方私有密钥的人才能对信息解密。
 * 另外，数字签名只采用了非对称密钥加密算法，它能保证发送信息的完整性、身份认证和不可否认性，
 * 而数字加密采用了对称密钥加密算法和非对称密钥加密算法相结合的方法，它能保证发送信息保密性。
 *
 */
