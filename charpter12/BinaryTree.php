<?php 
/**
 * 二叉树
 */
class BinaryTree
{
    
    /**
     * 构造方法
     */
    public function __construct($key = null, $left = null, $right = null)
    {
        $this->key = $key;
        if ($key === null) {
            $this->left = null;
            $this->right = null;
        } elseif ($left === null) {
            $this->left = new BinaryTree();
            $this->right = new BinaryTree();
        } else {
            $this->left = $left;
            $this->right = $right;
        }

    }

    /**
     * 析构方法
     */
    public function __destruct()
    {
        $this->key = null;
        $this->left = null;
        $this->right = null;
    }

    /**
     * 清空二叉树
     */
    public function purge()
    {
        $this->key = null;
        $this->left = null;
        $this->right = null;
    }

    /**
     * 检查当前节点是否是叶节点
     */
    public function isLeaf()
    {
        
    }

    /**
     * 检查节点是否为空
     */
    public function isEmpty()
    {
        
    }


    /**
     * Gets the value of key
     *
     * @return key
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Sets the value of key
     *
     * @param key $key 添加的key值
     *
     * @return 
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * 删除key
     */
    public function detacheKey()
    {
        
    }

    /**
     * 返回左子树
     *
     * @return object BinaryTree 当前节点的左子树
     */
    public function getLeft()
    {
        
    }

    /**
     * 返回右子树
     *
     * @return object BinaryTree 当前节点的右子树
     */
    public function getRight()
    {
        
    }
    
    /**
     * 给当前节点添加左子树
     *
     * @param object BinaryTree $t 给当前节点添加的子树
     */
    public function attachLeft($t)
    {
        
    }

    /**
     * 给当前节点添加右子树
     *
     * @param object BinaryTree $t 给当前节点添加的子树
     */
    public function attachRight($t)
    {
        
    }

    /**
     * 删除左子树
     */
    
}
