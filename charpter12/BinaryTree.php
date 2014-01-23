<?php 
/**
 * 二叉树
 */
class BinaryTree
{
    protected $key;
    protected $left;
    protected $right;
    protected $depth;
    
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
     *
     * @return boolean 如果节点飞空并且有两个空的子树时为真，否则为假
     */
    public function isLeaf()
    {
        return !$this->isEmpty() && $this->left->isEmpty() && $this->right->isEmpty();
    }

    /**
     * 检查节点是否为空
     *
     * @return boolean
     */
    public function isEmpty()
    {
        return $this->key === null;
    }


    /**
     * Gets the value of key
     *
     * @return key
     */
    public function getKey()
    {
        if ($this->isEmpty()) {
            return false;
        }
        return $this->key;
    }

    /**
     * Sets the value of key
     *
     * @param key $key 添加的key值
     *
     * @return BinaryTree
     */
    public function attachKey($key)
    {
        if (!$this->isEmpty()) {
            return false;
        }
        $this->key = $key;
        $this->left = new BinaryTree();
        $this->right = new BinaryTree();
    }

    /**
     * 删除key
     *
     * @return key
     */
    public function detachKey()
    {
        if (!$this->isLeaf()) {
            return false;
        }
        $result = $this->key;
        $this->key = null;
        $this->left = null;
        $this->right = null;
        return $result;
    }

    /**
     * 返回左子树
     *
     * @return object BinaryTree 当前节点的左子树
     */
    public function getLeft()
    {
        if ($this->isEmpty()) {
            return false;
        }
        return $this->left;
    }

    /**
     * 返回右子树
     *
     * @return object BinaryTree 当前节点的右子树
     */
    public function getRight()
    {
        if ($this->isEmpty()) {
            return false;
        }
        return $this->right;
    }
    
    /**
     * 给当前节点添加左子树
     *
     * @param object BinaryTree $t 给当前节点添加的子树
     */
    public function attachLeft($t)
    {
        if ($this->isEmpty() || !$this->left->isEmpty()) {
            return false;
        }
        $this->left = $t;
    }

    /**
     * 给当前节点添加右子树
     *
     * @param object BinaryTree $t 给当前节点添加的子树
     */
    public function attachRight($t)
    {
        if ($this->isEmpty() || !$this->right->isEmpty()) {
            return false;
        }
        $this->right = $t;
    }

    /**
     * 删除左子树
     *
     * @return object Binarytree
     */
    public function detachLeft()
    {
        if ($this->isEmpty()) {
            return false;
        }
        $result = $this->left;
        $this->left = new BinaryTree();
        return $result;
    }
    
    /**
     * 删除右子树
     *
     * @return object Binarytree
     */
    public function detachRight()
    {
        if ($this->isEmpty()) {
            return false;
        }
        $result = $this->right;
        $this->right = new BinaryTree();
        return $result;
    }

    /**
     * 深度优先遍历
     */
    public function depthFirstTraversal()
    {
        if (!$this->isEmpty()) {
            
        }
    }

    /**
     * 先序遍历
     */
    public function preorderTraversal()
    {
        if ($this->isEmpty()) {
            return ;
        }
        echo ' ',  $this->key;
        $this->left->preorderTraversal();
        $this->right->preorderTraversal();
    }

    /**
     * 中序遍历
     */
    public function inorderTraversal()
    {
        if ($this->isEmpty()) {
            return ;
        }
        $this->left->preorderTraversal();
        echo ' ', $this->key;
        $this->right->preorderTraversal();
    }

    /**
     * 后序遍历
     */
    public function postorderTraversal()
    {
        if ($this->isEmpty()) {
            return ;
        }
        $this->left->preorderTraversal();
        $this->right->preorderTraversal();
        echo ' ', $this->key;
    }

    /**
     * 二叉树深度
     *
     * @return depth
     */
    public function getDepth($t)
    {
        
        $t = isset($t) ? $t : $this;
        if ($t->isEmpty()) {
            return 0;
        }
        if ($this->left) {
            $i = $t->getDepth($t->left);
        } else {
            $i = 0;
        }
        if ($this->right) {
            $j = $t->getDepth($t->right);
        } else {
            $j = 0;
        }

        return $i > $j ? $i + 1 : $j + 1;
    }

    /**
     * 比较输入值与当前节点值
     */
    public function compare($obj)
    {
        return $obj - $this->getKey();
    }

    /**
     * 查找key所在的位置
     *
     * @param mixed $obj
     * @return boolean true 如果存在则返回包含该值的对象，否则为null
     */
    public function find($obj)
    {
        if ($this->isEmpty()) {
           return null;
        }
        $diff = $this->compare($obj);
        if ($diff == 0) {
            return $this->getKey();
        } elseif ($diff < 0) {
            return $this->getLeft()->find($obj);
        } else {
            return $this->getRight()->find($obj);
        }

    }
    
    /**
     * 查找最小值
     *
     * @return mixed 如果存在则返回最小值，否则返回null
     */
    public function findMin()
    {
        if ($this->isEmpty()) {
            return null;
        } elseif ($this->getLeft()->isEmpty()) {
            return $this->getKey();
        } else {
            return $this->getLeft()->findMin();
        }
    }

    /**
     * 查找最大值
     *
     * @return mixed 如果存在则返回最大值，否则返回null
     */
    public function findMax()
    {
        if ($this->isEmpty()) {
            return null;
        } elseif ($this->getRight()->isEmpty()) {
            return $this->getKey();
        } else {
            return $this->getRight()->findMax();
        }
    }

    /**
     * 给排序二叉树插入指定值
     *
     * @param mixed $obj 需要插入的值，如果指定值在树中存在，则返回错误
     */
    public function insert($obj)
    {
        if ($this->isEmpty()) {
            $this->attachKey($obj);
        } else {
            $diff = $this->compare($obj);
            if ($diff == 0) {
                die('already exist');
            } elseif ($diff < 0) {
                $this->getLeft()->insert($obj);
            } else {
                $this->getRight()->insert($obj);
            }
        }
    }

    /**
     * 从排序二叉树中删除指定值
     *
     * @param mixed $obj 需要删除的值
     */
    public function delete($obj)
    {
        if ($this->isEmpty()) {
            die();
        }
        $diff = $this->compare($obj);
        if ($diff == 0) {
            if (!$this->getLeft()->isEmpty()) {
                $max = $this->getLeft()->findMax();
                $this->key = $max;
                $this->getLeft()->delete($max);
            } elseif (!$this->getRight()->isEmpty()) {
                $min = $this->getRight()->findMin();
                $this->key = $min;
                $this->getRight()->delete($min);
            } else {
                $this->detachKey();
            }
        } elseif ($diff < 0) {
            $this->getLeft()->delete($obj);
        } else {
            $this->getRight()->delete($obj);
        }

    }

    /**
     * test
     */
    public static function test($args)
    {
        $root = new BinaryTree();
        foreach ($args as $row) {
            $root->insert($row);
        }
        return $root;
    }
}

//$root = BST::main(array(50, 3, 10, 5, 100, 56, 78));
$arr = range(1, 10);
shuffle($arr);
$root = BinaryTree::test($arr);
//echo '<pre>'; print_r($root); echo '</pre>';
echo '<br/>';
echo $root->findMax();
echo '<br/>';
echo $root->preorderTraversal();
$root->delete(10);
echo '<br/>';
echo $root->findMax();
echo '<br/>';
echo $root->preorderTraversal();
